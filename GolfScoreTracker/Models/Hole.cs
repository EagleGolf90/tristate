using System.ComponentModel.DataAnnotations;

namespace GolfScoreTracker.Models
{
    public class Hole
    {
        public int Id { get; set; }
        
        [Range(1, 18)]
        public int Number { get; set; }
        
        [Range(3, 5)]
        public int Par { get; set; }
        
        public int Yardage { get; set; }
        
        public int CourseId { get; set; }
        public Course Course { get; set; } = null!;
        
        public List<Score> Scores { get; set; } = new();
    }
}