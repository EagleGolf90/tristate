using Microsoft.EntityFrameworkCore;
using GolfScoreTracker.Models;

namespace GolfScoreTracker.Data
{
    public class GolfDbContext : DbContext
    {
        public GolfDbContext(DbContextOptions<GolfDbContext> options) : base(options)
        {
        }

        public DbSet<Organization> Organizations { get; set; }
        public DbSet<Player> Players { get; set; }
        public DbSet<Course> Courses { get; set; }
        public DbSet<Hole> Holes { get; set; }
        public DbSet<Round> Rounds { get; set; }
        public DbSet<Score> Scores { get; set; }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            base.OnModelCreating(modelBuilder);

            // Configure relationships
            modelBuilder.Entity<Player>()
                .HasOne(p => p.Organization)
                .WithMany(o => o.Players)
                .HasForeignKey(p => p.OrganizationId);

            modelBuilder.Entity<Hole>()
                .HasOne(h => h.Course)
                .WithMany(c => c.Holes)
                .HasForeignKey(h => h.CourseId);

            modelBuilder.Entity<Round>()
                .HasOne(r => r.Course)
                .WithMany(c => c.Rounds)
                .HasForeignKey(r => r.CourseId);

            modelBuilder.Entity<Score>()
                .HasOne(s => s.Player)
                .WithMany(p => p.Scores)
                .HasForeignKey(s => s.PlayerId);

            modelBuilder.Entity<Score>()
                .HasOne(s => s.Hole)
                .WithMany(h => h.Scores)
                .HasForeignKey(s => s.HoleId);

            modelBuilder.Entity<Score>()
                .HasOne(s => s.Round)
                .WithMany(r => r.Scores)
                .HasForeignKey(s => s.RoundId);

            // Seed data
            SeedData(modelBuilder);
        }

        private void SeedData(ModelBuilder modelBuilder)
        {
            // Seed Organizations
            modelBuilder.Entity<Organization>().HasData(
                new Organization { Id = 1, Name = "Pine Valley Golf Club", Abbreviation = "PVGC" },
                new Organization { Id = 2, Name = "Oakmont Country Club", Abbreviation = "OCC" },
                new Organization { Id = 3, Name = "Augusta National", Abbreviation = "ANG" }
            );

            // Seed Courses
            modelBuilder.Entity<Course>().HasData(
                new Course { Id = 1, Name = "Championship Course", Location = "Main Location", TotalPar = 72 }
            );

            // Seed Holes (18 holes for the championship course)
            var holes = new List<Hole>();
            var parValues = new int[] { 4, 4, 3, 5, 4, 3, 4, 5, 4, 4, 5, 3, 4, 4, 3, 5, 4, 4 };
            var yardages = new int[] { 420, 385, 175, 520, 405, 165, 410, 545, 380, 430, 510, 180, 395, 415, 155, 535, 425, 440 };

            for (int i = 1; i <= 18; i++)
            {
                holes.Add(new Hole 
                { 
                    Id = i, 
                    Number = i, 
                    Par = parValues[i-1], 
                    Yardage = yardages[i-1], 
                    CourseId = 1 
                });
            }
            modelBuilder.Entity<Hole>().HasData(holes);

            // Seed Players
            modelBuilder.Entity<Player>().HasData(
                new Player { Id = 1, FirstName = "Tiger", LastName = "Woods", Email = "tiger@golf.com", Handicap = 0, OrganizationId = 1 },
                new Player { Id = 2, FirstName = "Phil", LastName = "Mickelson", Email = "phil@golf.com", Handicap = 2, OrganizationId = 1 },
                new Player { Id = 3, FirstName = "Rory", LastName = "McIlroy", Email = "rory@golf.com", Handicap = 1, OrganizationId = 2 },
                new Player { Id = 4, FirstName = "Jordan", LastName = "Spieth", Email = "jordan@golf.com", Handicap = 1, OrganizationId = 2 },
                new Player { Id = 5, FirstName = "Justin", LastName = "Thomas", Email = "justin@golf.com", Handicap = 0, OrganizationId = 3 },
                new Player { Id = 6, FirstName = "Brooks", LastName = "Koepka", Email = "brooks@golf.com", Handicap = 0, OrganizationId = 3 }
            );

            // Seed Rounds
            modelBuilder.Entity<Round>().HasData(
                new Round { Id = 1, Name = "Round 1 - Morning", Date = DateTime.Today.AddDays(-1), IsCompleted = true, CourseId = 1 },
                new Round { Id = 2, Name = "Round 2 - Afternoon", Date = DateTime.Today, IsCompleted = false, CourseId = 1 }
            );
        }
    }
}