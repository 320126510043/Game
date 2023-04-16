// Set up game variables
let score = 0;
let timer = 60;
let gameInterval;
let playerInterval;

// Set up game functions
function startGame() {
	// Disable start button and enable reset button
	document.getElementById('start-button').disabled = true;
	document.getElementById('reset-button').disabled = false;

	// Reset score and timer
	score = 0;
	timer = 60;

	// Update score and timer displays
	updateScoreDisplay();
	updateTimerDisplay();

	// Set up game interval to move obstacles
	gameInterval = setInterval(moveObstacles, 1000);

	// Set up player interval to move player
	playerInterval = setInterval(movePlayer, 100);

	// Add event listener for keydown to move player
	document.addEventListener('keydown', handleKeyDown);
}

function resetGame() {
	// Enable start button and disable reset button
	document.getElementById('start-button').disabled = false;
	document.getElementById('reset-button').disabled = true;

	// Stop game and player intervals
	clearInterval(gameInterval);
	clearInterval(playerInterval);

	// Remove event listener for keydown
	document.removeEventListener('keydown', handleKeyDown);

	// Reset player and treasure positions
	document.getElementById('player').style.top = '50%';
	document.getElementById('player').style.left = '50%';
	document.getElementById('treasure').style.top = '100px';
	document.getElementById('treasure').style.left = '100px';
}

function handleKeyDown(event) {
	// Get current player position
	let playerPosition = {
		top: document.getElementById('player').offsetTop,
		left: document.getElementById('player').offsetLeft
	};

	// Move player based on key pressed
	switch (event.key) {
		case 'ArrowUp':
			if (playerPosition.top > 0) {
				document.getElementById('player').style.top = playerPosition.top - 10 + 'px';
			}
			break;
		case 'ArrowDown':
			if (playerPosition.top < 450) {
				document.getElementById('player').style.top = playerPosition.top + 10 + 'px';
			}
			break;
		case 'ArrowLeft':
			if (playerPosition.left > 0) {
				document.getElementById('player').style.left = playerPosition.left - 10 + 'px';
			}
			break;
		case 'ArrowRight':
			if (playerPosition.left < 450) {
				document.getElementById('player').style.left = playerPosition.left + 10 + 'px';
			}
			break;
	}

	// Check if player has found treasure
	checkTreasure();
}

function moveObstacles() {
	// Get all obstacles
	let obstacles = document.getElementsByClassName('obstacle');

	// Move each obstacle down one position
	for (let i = 0; i < obstacles.length; i++) {
		let obstaclePosition = {
			top: obstacles[i].offsetTop,
			left: obstacles[i].offsetLeft
		};
		obstacles[i].style.top = obstaclePosition.top + 50 + 'px';

		// Check if obstacle has hit player
		if (obstaclePosition.top + 50 > document.getElementById('player').offsetTop && obstaclePosition.top < document.getElementById('player').offsetTop + 50 &&
			obstaclePosition.left + 50 > document.getElementById('player').offsetLeft && obstaclePosition.left < document.getElementById('player').offsetLeft + 50) {
			endGame();
			break;
		}
	}
}

function movePlayer() {
	// Get current player position
	let playerPosition = {
		top: document.getElementById('player').offsetTop,
	
        left: document.getElementById('player').offsetLeft
    };
    
    // Move player up one position
    document.getElementById('player').style.top = playerPosition.top - 1 + 'px';
    
    // Check if player has hit top boundary
    if (playerPosition.top < 0) {
        document.getElementById('player').style.top = '450px';
    }
}
    
// Check if player has found treasure
checkTreasure();
function checkTreasure() {
    // Get current player and treasure positions
    let playerPosition = {
    top: document.getElementById('player').offsetTop,
    left: document.getElementById('player').offsetLeft
    };
    let treasurePosition = {
    top: document.getElementById('treasure').offsetTop,
    left: document.getElementById('treasure').offsetLeft
    };
}
// Check if player has found treasure
if (playerPosition.top + 50 > treasurePosition.top && playerPosition.top < treasurePosition.top + 50 &&
	playerPosition.left + 50 > treasurePosition.left && playerPosition.left < treasurePosition.left + 50) {
	// Update score and treasure position
	score++;
	document.getElementById('score').innerHTML = score;
	document.getElementById('treasure').style.top = Math.floor(Math.random() * 400) + 'px';
	document.getElementById('treasure').style.left = Math.floor(Math.random() * 400) + 'px';
}


function updateScoreDisplay() {
document.getElementById('score').innerHTML = score;
}

function updateTimerDisplay() {
document.getElementById('timer').innerHTML = timer;
}

function endGame() {
// Stop game and player intervals
clearInterval(gameInterval);
clearInterval(playerInterval);
// Remove event listener for keydown
document.removeEventListener('keydown', handleKeyDown);

// Show game over message
alert('Game Over! Your final score is ' + score);

// Reset game
resetGame();
}

// Add event listeners for start and reset buttons
document.getElementById('start-button').addEventListener('click', startGame);
document.getElementById('reset-button').addEventListener('click', resetGame);
