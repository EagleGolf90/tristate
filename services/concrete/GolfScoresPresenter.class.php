<?php
/**
 * Class GolfScoresPresenter
 * Responsible for formatting golfer score rows as HTML.
 */
class GolfScoresPresenter
{
    /**
     * Returns a table row with the golfer's name and total score.
     *
     * @param array $row Associative array with keys 'LastName', 'FirstName', and 'TotalScore'.
     * @return string HTML table row.
     */
    public function formatGolferRow(array $row): string
    {
        $lastName = isset($row['LastName']) ? htmlspecialchars($row['LastName']) : '';
        $firstName = isset($row['FirstName']) ? htmlspecialchars($row['FirstName']) : '';
        $totalScore = isset($row['TotalScore']) && $row['TotalScore'] !== '' 
            ? htmlspecialchars($row['TotalScore']) 
            : '&nbsp;';

        return "<tr><td>{$lastName}, {$firstName}</td><td>{$totalScore}</td></tr>";
    }

    /**
     * Returns a table row with the course's name.
     *
     * @param array $row Associative array with keys 'CourseName'.
     * @return string HTML table row.
     */
    public function formatCourseRow(array $row): string
    {
        return "<tr><td>{$row['CourseName']}</td></tr>";
    }

}
?>
