using System.ComponentModel.DataAnnotations;

namespace GolfScoreTracker.Models
{
    public class Score
    {
        public int Id { get; set; }
        
        [Range(1, 15)]
        public int StrokeCount { get; set; }
        
        public int PlayerId { get; set; }
        public Player Player { get; set; } = null!;
        
        public int HoleId { get; set; }
        public Hole Hole { get; set; } = null!;
        
        public int RoundId { get; set; }
        public Round Round { get; set; } = null!;
        
        public DateTime CreatedAt { get; set; } = DateTime.UtcNow;
        
        public int ScoreToPar => StrokeCount - Hole.Par;
        
        public string ScoreText => ScoreToPar switch
        {
            -2 => "Eagle",
            -1 => "Birdie", 
            0 => "Par",
            1 => "Bogey",
            2 => "Double Bogey",
            _ when ScoreToPar < -2 => "Better than Eagle",
            _ => $"+{ScoreToPar}"
        };
    }
}