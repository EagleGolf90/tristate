using System.ComponentModel.DataAnnotations;

namespace GolfScoreTracker.Models
{
    public class Round
    {
        public int Id { get; set; }
        
        [Required]
        [StringLength(100)]
        public string Name { get; set; } = string.Empty;
        
        public DateTime Date { get; set; }
        
        public bool IsCompleted { get; set; }
        
        public int CourseId { get; set; }
        public Course Course { get; set; } = null!;
        
        public List<Score> Scores { get; set; } = new();
    }
}