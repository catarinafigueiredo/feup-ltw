--DROP TABLE IF EXISTS Post;
--DROP TABLE IF EXISTS Comment;
--DROP TABLE IF EXISTS Vote;
--DROP TABLE IF EXISTS user;
--DROP TABLE IF EXISTS Category;
--DROP TABLE IF EXISTS SubscribeCategory;
--BEGIN TRANSACTION;

--Table: User
CREATE TABLE user (
    --UserID   INTEGER PRIMARY KEY,
    --Name   TEXT ,
    username VARCHAR PRIMARY KEY,
    password VARCHAR NOT NULL,
    nome TEXT,
    DataNascimento DATE,
    email TEXT

);

--Table: Category
CREATE TABLE Category (
    CategoryName   TEXT PRIMARY KEY 

);

CREATE TABLE SubscribeCategory (
    username TEXT REFERENCES user(username),
    CategoryName  TEXT REFERENCES Category(CategoryName)
);

--Table: Post
CREATE TABLE Post (
    Title VARCHAR,
    Dados VARCHAR,
    postID   INTEGER PRIMARY KEY,
    CategoryName TEXT REFERENCES Category(CategoryName),
    username TEXT REFERENCES user(username),
    up INTEGER,
    down INTEGER

);


--Table: Comment
CREATE TABLE Comment (
    Dados TEXT,
    CommentID   INTEGER PRIMARY KEY,
    FatherCommentID INTEGER REFERENCES Comment(CommentID),
    PostID INTEGER REFERENCES Post(postID),
    username TEXT REFERENCES user(username),
    up INTEGER,
    down INTEGER

);



--Table: Vote
CREATE TABLE Vote (
    VoteID INTEGER PRIMARY KEY,
    PostID INTEGER REFERENCES Post(postID),
    username INTEGER REFERENCES user(username),
    CommentID INTEGER REFERENCES Comment(CommentID),
    typeVote CHAR NOT NULL


);


INSERT INTO user VALUES('up201606334','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);
INSERT INTO user VALUES('Miguel','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);

INSERT INTO Category VALUES('culinaria');
INSERT INTO Category VALUES('desporto');

INSERT INTO SubscribeCategory VALUES('up201606334','culinaria');
INSERT INTO SubscribeCategory VALUES('Miguel','desporto');



INSERT INTO Post VALUES('BLABLABLA','rgrihgirpgrhp \n iejhtoifhpfoe',NULL,'culinaria','up201606334',0,0);

INSERT INTO Post VALUES('BLA','rgVRVRVRVRVBRVfhpfoe',NULL,'desporto','Miguel',0,0);





--COMMIT TRANSACTION;
