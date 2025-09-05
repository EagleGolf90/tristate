<?php
class ScoresPresenter
{
    public function formatGolferRow(array $row): string
    {
        $lastName = isset($row['LastName']) ? htmlspecialchars($row['LastName']) : '';
        $firstName = isset($row['FirstName']) ? htmlspecialchars($row['FirstName']) : '';
        $totalScore = isset($row['TotalScore']) && $row['TotalScore'] !== '' 
            ? htmlspecialchars($row['TotalScore']) 
            : '&nbsp;';

        return "<tr><td>{$lastName}, {$firstName}</td><td>{$totalScore}</td></tr>";
    }

    public function formatCourseName($courseName): string
    {
        return "<h1>{$courseName}</h1>";
    }

    public function formatDatePlayed($datePlayed): string
    {
        return "<h2>{$datePlayed}</h2>";
    }

    public function formatCityState($city_state): string
    {
        return "<h3>{$city_state}</h3>";
    }

    public function isTeamFinalCut($team_cut)
    {
        return ($team_cut == $this->finalCut);
    }

    public function isSecondRowOrMore($x)
    {
        return ($x > 0);
    }

    public function separator() {
        return '<hr/>';
    }

}
?>
