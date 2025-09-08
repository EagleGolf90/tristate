using Microsoft.EntityFrameworkCore;
using GolfScoreTracker.Data;
using GolfScoreTracker.Models;

namespace GolfScoreTracker.Services
{
    public class GolfService : IGolfService
    {
        private readonly GolfDbContext _context;

        public GolfService(GolfDbContext context)
        {
            _context = context;
        }

        public async Task<List<Player>> GetPlayersAsync()
        {
            return await _context.Players
                .Include(p => p.Organization)
                .Include(p => p.Scores)
                    .ThenInclude(s => s.Hole)
                .OrderBy(p => p.LastName)
                .ToListAsync();
        }

        public async Task<List<Player>> GetLeaderboardAsync(int? roundId = null)
        {
            var query = _context.Players
                .Include(p => p.Organization)
                .Include(p => p.Scores.Where(s => !roundId.HasValue || s.RoundId == roundId.Value))
                    .ThenInclude(s => s.Hole);

            var players = await query.ToListAsync();
            
            return players
                .Where(p => p.Scores.Any())
                .OrderBy(p => p.TotalScore)
                .ToList();
        }

        public async Task<List<Round>> GetRoundsAsync()
        {
            return await _context.Rounds
                .Include(r => r.Course)
                .OrderBy(r => r.Date)
                .ToListAsync();
        }

        public async Task<Round?> GetCurrentRoundAsync()
        {
            return await _context.Rounds
                .Include(r => r.Course)
                .Where(r => !r.IsCompleted)
                .OrderBy(r => r.Date)
                .FirstOrDefaultAsync();
        }

        public async Task<List<Course>> GetCoursesAsync()
        {
            return await _context.Courses
                .Include(c => c.Holes)
                .ToListAsync();
        }

        public async Task<Course?> GetCourseWithHolesAsync(int courseId)
        {
            return await _context.Courses
                .Include(c => c.Holes.OrderBy(h => h.Number))
                .FirstOrDefaultAsync(c => c.Id == courseId);
        }

        public async Task<List<Score>> GetScoresForPlayerRoundAsync(int playerId, int roundId)
        {
            return await _context.Scores
                .Include(s => s.Hole)
                .Where(s => s.PlayerId == playerId && s.RoundId == roundId)
                .OrderBy(s => s.Hole.Number)
                .ToListAsync();
        }

        public async Task<Score> AddScoreAsync(Score score)
        {
            _context.Scores.Add(score);
            await _context.SaveChangesAsync();
            return score;
        }

        public async Task<Score> UpdateScoreAsync(Score score)
        {
            _context.Scores.Update(score);
            await _context.SaveChangesAsync();
            return score;
        }

        public async Task<Player> AddPlayerAsync(Player player)
        {
            _context.Players.Add(player);
            await _context.SaveChangesAsync();
            return player;
        }

        public async Task<List<Organization>> GetOrganizationsAsync()
        {
            return await _context.Organizations
                .OrderBy(o => o.Name)
                .ToListAsync();
        }

        public async Task<List<Player>> GetPlayersByOrganizationAsync(int organizationId)
        {
            return await _context.Players
                .Include(p => p.Scores)
                    .ThenInclude(s => s.Hole)
                .Where(p => p.OrganizationId == organizationId)
                .OrderBy(p => p.LastName)
                .ToListAsync();
        }

        public async Task<Dictionary<int, int>> GetTeamScoresAsync(int? roundId = null)
        {
            var organizations = await _context.Organizations
                .Include(o => o.Players)
                    .ThenInclude(p => p.Scores.Where(s => !roundId.HasValue || s.RoundId == roundId.Value))
                .ToListAsync();

            var teamScores = new Dictionary<int, int>();

            foreach (var org in organizations)
            {
                var topPlayersScores = org.Players
                    .Where(p => p.Scores.Any())
                    .OrderBy(p => p.TotalScore)
                    .Take(4) // Top 4 players count for team score
                    .Sum(p => p.TotalScore);

                if (topPlayersScores > 0)
                {
                    teamScores[org.Id] = topPlayersScores;
                }
            }

            return teamScores;
        }
    }
}