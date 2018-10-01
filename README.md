**Web Scripting with PHP**

Contributors: Jose Antoine Leon Cordero & Ricardo Sanchez

Notes:

- Info API is finalized.
- New API is finalized??? Inquire about the Request URL & required request parameters.
- Breaking down of URL is simple, however, should our web service just ultimately "echo" the data through JSON? 
(inquire).


- data/globals.php should hold all common data.
- play/Board.php defines the board class.
- play/FileIO.php defines file interaction functions.
- play/Game.php defines a game instance.
- play/MoveStrategy.php defines an abstract class "MoveStrategy", which is extended by the types of strategies allowed.

Requirements:

1.  The web service shall work with a provided Java client available
    and downloadable from the course website (c4Client.jar).

2.  The web service shall support multiple clients concurrently, each
    client playing against the server (see R5 below). 

3.  A game board shall consist of six rows and seven columns, i.e.,
    6*7 places in which discs can be dropped.

4.  A column of the board shall be identified by a 0-based index,
    e.g., 2 for the third column.

5.  The web service shall provide at least two different move
    strategies for the computer, say Random and Smart. The Smart
    strategy shall be indeed "smart" to allow for a realistic
    play. Minimally, it should detect a winning/loosing row, i.e.,
    three consecutive discs with an open end.

6.  The web service shall determine the outcome: win, loss, or draw.
