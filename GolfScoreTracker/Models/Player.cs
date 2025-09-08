using System.ComponentModel.DataAnnotations;

namespace GolfScoreTracker.Models
{
    public class Player
    {
        public int Id { get; set; }
        
        [Required]
        [StringLength(50)]
        public string FirstName { get; set; } = string.Empty;
        
        [Required]
        [StringLength(50)]
        public string LastName { get; set; } = string.Empty;
        
        [StringLength(100)]
        public string? Email { get; set; }
        
        public int? Handicap { get; set; }
        
        public int OrganizationId { get; set; }
        public Organization Organization { get; set; } = null!;
        
        public List<Score> Scores { get; set; } = new();
        
        public string FullName => $"{FirstName} {LastName}";
        
        public int TotalScore => Scores.Sum(s => s.StrokeCount);
        
        public int NetScore => TotalScore - (Handicap ?? 0);
    }
}