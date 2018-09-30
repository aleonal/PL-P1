**Web Scripting with PHP**

Contributors: Jose Antoine Leon Cordero & Ricardo Sanchez

Notes:

1.  Inquire about usage of info/index.php. (Get GameInfo from current game or return possible game configurations).
    Then, implement correctly.

Requirements:

R1: The web service shall work with a provided Java client available
    and downloadable from the course website (c4Client.jar).

R2: The web service shall support multiple clients concurrently, each
    client playing against the server (see R5 below). 

R3: A game board shall consist of six rows and seven columns, i.e.,
    6*7 places in which discs can be dropped.

R4: A column of the board shall be identified by a 0-based index,
    e.g., 2 for the third column.

R5: The web service shall provide at least two different move
    strategies for the computer, say Random and Smart. The Smart
    strategy shall be indeed "smart" to allow for a realistic
    play. Minimally, it should detect a winning/loosing row, i.e.,
    three consecutive discs with an open end.

R6: The web service shall determine the outcome: win, loss, or draw.
