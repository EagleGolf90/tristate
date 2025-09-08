# Golf Score Tracker - Blazor Application

A complete golf tournament score tracking application built with Blazor Server and Entity Framework Core.

## Features

### 🏆 Tournament Management
- **Leaderboard**: Real-time tournament standings with team scores
- **Score Entry**: Professional golf scorecard interface for entering 18-hole scores
- **Player Management**: Organize players by golf clubs/organizations
- **Round Management**: Support for multiple tournament rounds

### 🎯 Key Functionality
- **Interactive Scorecard**: Full 18-hole scorecard with:
  - Par tracking for each hole
  - Automatic score-to-par calculations
  - Front 9, back 9, and total scoring
  - Real-time score updates
- **Team Scoring**: Automatic team score calculation based on top 4 players
- **Handicap Support**: Player handicap tracking and net score calculations
- **Responsive Design**: Works on desktop and mobile devices

### 🏌️ Golf-Specific Features
- **Professional Scorecard Layout**: Traditional golf scorecard format
- **Score-to-Par Display**: Eagle, Birdie, Par, Bogey indicators
- **Organization-Based Teams**: Players grouped by golf clubs
- **Round-Based Scoring**: Support for multiple tournament rounds
- **Real-time Leaderboard**: Live tournament standings

## Technology Stack

- **Frontend**: Blazor Server (C#)
- **Backend**: ASP.NET Core 8.0
- **Database**: SQLite with Entity Framework Core
- **UI Framework**: Bootstrap 5
- **Icons**: Font Awesome 6

## Getting Started

### Prerequisites
- .NET 8.0 SDK
- Modern web browser

### Running the Application

1. Navigate to the application directory:
   ```bash
   cd GolfScoreTracker
   ```

2. Run the application:
   ```bash
   dotnet run
   ```

3. Open your browser and navigate to `http://localhost:5084`

### Sample Data
The application comes pre-loaded with:
- 3 golf organizations (Pine Valley Golf Club, Oakmont Country Club, Augusta National)
- 6 professional golfers
- Championship course with 18 holes
- 2 tournament rounds

## Database Schema

### Core Entities
- **Organizations**: Golf clubs/teams
- **Players**: Tournament participants with handicaps
- **Courses**: Golf courses with hole details
- **Rounds**: Tournament rounds
- **Scores**: Individual hole scores for players

### Key Relationships
- Players belong to Organizations
- Scores link Players, Holes, and Rounds
- Automatic team scoring based on organization

## Usage Guide

### Entering Scores
1. Go to "Score Entry" page
2. Select a tournament round
3. Select a player
4. Click "Load Scorecard"
5. Enter scores for each hole (1-15 strokes)
6. Click "Save Scores"

### Viewing Leaderboard
1. Go to "Leaderboard" page
2. Select "All Rounds" or specific round
3. View players grouped by organization
4. See individual and team scores

### Managing Players
1. Go to "Players" page
2. View players organized by golf club
3. Add new players using "Add New Player" button
4. Search players using the search box

## Architecture

### Data Layer
- Entity Framework Core with Code-First approach
- SQLite database for simplicity and portability
- Automatic database creation with seed data

### Business Layer
- Service-based architecture with dependency injection
- IGolfService interface for golf-specific operations
- Separation of concerns between data access and business logic

### Presentation Layer
- Blazor Server for real-time interactivity
- Component-based UI architecture
- Server-side rendering with SignalR for real-time updates

## Future Enhancements

- **Course Management**: Add/edit courses and holes
- **Tournament Setup**: Create and configure tournaments
- **Scoring Rules**: Different tournament formats (stroke play, match play)
- **Statistics**: Player performance analytics
- **Export Features**: PDF scorecards and reports
- **Mobile App**: Native mobile application
- **Live Scoring**: Real-time score entry during play

---

Built with ❤️ using Blazor Server and .NET 8