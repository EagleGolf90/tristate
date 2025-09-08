using GolfScoreTracker.Models;

namespace GolfScoreTracker.Services
{
    public interface IGolfService
    {
        Task<List<Player>> GetPlayersAsync();
        Task<List<Player>> GetLeaderboardAsync(int? roundId = null);
        Task<List<Round>> GetRoundsAsync();
        Task<Round?> GetCurrentRoundAsync();
        Task<List<Course>> GetCoursesAsync();
        Task<Course?> GetCourseWithHolesAsync(int courseId);
        Task<List<Score>> GetScoresForPlayerRoundAsync(int playerId, int roundId);
        Task<Score> AddScoreAsync(Score score);
        Task<Score> UpdateScoreAsync(Score score);
        Task<Player> AddPlayerAsync(Player player);
        Task<List<Organization>> GetOrganizationsAsync();
        Task<List<Player>> GetPlayersByOrganizationAsync(int organizationId);
        Task<Dictionary<int, int>> GetTeamScoresAsync(int? roundId = null);
    }
}