using System.ComponentModel.DataAnnotations;

namespace GolfScoreTracker.Models
{
    public class Organization
    {
        public int Id { get; set; }
        
        [Required]
        [StringLength(100)]
        public string Name { get; set; } = string.Empty;
        
        [StringLength(10)]
        public string? Abbreviation { get; set; }
        
        public List<Player> Players { get; set; } = new();
    }
}