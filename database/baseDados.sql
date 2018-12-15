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
    down INTEGER,
    pDate Date

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
INSERT INTO user VALUES('Lucas','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);
INSERT INTO user VALUES('Joana','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);
INSERT INTO user VALUES('Rui','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);
INSERT INTO user VALUES('Matilde','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);
INSERT INTO user VALUES('Mafalda','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);
INSERT INTO user VALUES('Jorge','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);
INSERT INTO user VALUES('Julio','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);


INSERT INTO SubscribeCategory VALUES('up201606334','culinaria');
INSERT INTO SubscribeCategory VALUES('Miguel','desporto');

INSERT INTO Category VALUES('Culinaria');
INSERT INTO Category VALUES('Desporto');
INSERT INTO Category VALUES('Comédia');
INSERT INTO Category VALUES('Saude');
INSERT INTO Category VALUES('Ensino');
INSERT INTO Category VALUES('Música');
INSERT INTO Category VALUES('Arte');
INSERT INTO Category VALUES('História');
INSERT INTO Category VALUES('Politica');
INSERT INTO Category VALUES('Metereologia');
INSERT INTO Category VALUES('Ciencia');
INSERT INTO Category VALUES('Economia');
INSERT INTO Category VALUES('Cinema');
INSERT INTO Category VALUES('Lazer');
INSERT INTO Category VALUES('Literatura');
INSERT INTO Category VALUES('Novas tecnologias');





INSERT INTO Post VALUES('Tronco de Natal com Doce de Ovos','Para a torta:
6 ovos
180g de açúcar
180g de farinha de trigo tipo 55 sem fermento
1 colher de chá de fermento
1 forma retangular com 40 cm de comprimento e 30 cm de largura,
previamente untada com manteiga, forrada com papel vegetal e novamente untada com manteiga
Para o doce de ovos:
6 gemas de ovo
150g de açúcar
Para a cobertura:
200g de chocolate de culinária em tablete, partido em pedaços
200g de manteiga à temperatura ambiente
200g de açúcar em pó
Para a decoração:
125g de fios de ovos
Cerejas em calda
Preparação:

1. Comece por fazer o doce de ovos.
Mexa as gemas com um garfo.
Num tachinho, leve ao lume 125 ml de água e o açúcar.
Mexa e deixe ferver durante 3 minutos.
Passado o tempo e quando a calda fizer gotinhas na ponta da colher, está no ponto pérola, retire.
Deixe arrefecer durante 5 minutos.

2. Passado o tempo, junte as gemas à calda e misture muito bem.
Leve novamente ao lume e sem parar de mexer, deixe cozinhar em lume brando.
Quando o doce de ovos ficar espesso, retire do lume e deixe arrefecer totalmente.
Guarde o doce de ovos no frigorífico.

3. Faça a torta.
Numa tigela, parta os ovos,
junte o açúcar e bata muito bem até que fique um creme fofo.
Enquanto bate, adicione aos poucos a farinha e o fermento.
Bata até que tudo fique bem misturado.
Tenha atenção para não bater demasiado tempo.
Verta a massa no tabuleiro e espalhe por igual.

4. Leve ao forno pré-aquecido nos 180ºC e deixe cozer durante 25 minutos, até que a massa fique cozida e lourinha.
Depois do tempo, retire e desenforme sobre uma folha de papel vegetal.
Deixe arrefecer durante 5 minutos.

5. Quando a torta estiver morna, espalhe por cima o doce de ovos, sem chegar à extremidade que a torta fecha, para que não saia o recheio para fora.
Com cuidado, enrole bem a torta.
Aconchegue e deixe arrefecer.

6. Depois da torta fria, corte as duas extremidades em triângulo, para fazer os troncos.
Coloque a torta num prato de servir e faça a cobertura.

7. Coloque numa panela em banho maria, o chocolate.
Deixe derreter e mexa muito bem até que fique homogéneo.
Numa tigela, coloque a manteiga e o açúcar em pó.
Bata até que fique um creme.
Enquanto bate, junte ao creme aos poucos, o chocolate derretido.
Bata até que fique um creme consistente.

8. Barre a torta com o chocolate, sem barrar as extremidades.
Passe com um garfo sobre a cobertura para fazer o efeito do tronco.
Por cima da torta, coloque um dos troncos e prenda-o com um palito.
Faça o mesmo com o outro tronco, na parte lateral.
Barre os troncos com o creme, sem barrar as extremidades.
Passe com o garfo para fazer o mesmo efeito.

9. Decore a gosto com os fios de ovos e com as cerejas.
A equipa do SaborIntenso.com deseja-lhe um bom apetite!',NULL,'Culinaria','up201606334',0,0,NULL);

INSERT INTO Post VALUES('Lesão de Rafa pode evitar a saída de Zivkovic','Zivkovic estava na lista de saídas para o mercado de janeiro, uma vez que não tem sido muito utilizado por Rui Vitória. No entanto, a lesão contraída por Rafa, no último duelo, pode mudar os planos do emblema encarnado, de acordo com o jornal O Jogo, deste sábado.

O português de 25 anos sofreu uma rotura muscular na coxa esquerda, no jogo com o AEK, para a Liga dos Campeões, o que o deixará fora da competição até ao final de janeiro de 2019.

Nesse sentido, Zivkovic, que estava na lista de jogadores para negociar no mercado de transferências, terá de ficar e será uma opção para a ausência de Rafa.

Recorde-se que Rafa, que chegou ao Benfica na temporada 2016/17, vindo do Sporting de Braga, tem um contrato assinado com o clube até junho de 2021. ',NULL,'Desporto','Miguel',0,0,NULL);





--COMMIT TRANSACTION;
