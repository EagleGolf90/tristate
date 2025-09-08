using System.ComponentModel.DataAnnotations;

namespace GolfScoreTracker.Models
{
    public class Course
    {
        public int Id { get; set; }
        
        [Required]
        [StringLength(100)]
        public string Name { get; set; } = string.Empty;
        
        [StringLength(200)]
        public string? Location { get; set; }
        
        public int TotalPar { get; set; }
        
        public List<Hole> Holes { get; set; } = new();
        
        public List<Round> Rounds { get; set; } = new();
    }
}