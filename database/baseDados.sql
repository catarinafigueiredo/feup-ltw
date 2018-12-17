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
    pDate DATETIME CHECK (pDate>0)

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


INSERT INTO SubscribeCategory VALUES('up201606334','Culinaria');
INSERT INTO SubscribeCategory VALUES('Miguel','Desporto');

INSERT INTO Category VALUES('Culinaria');
INSERT INTO Category VALUES('Desporto');
INSERT INTO Category VALUES('Comedia');
INSERT INTO Category VALUES('Saude');
INSERT INTO Category VALUES('Ensino');
INSERT INTO Category VALUES('Musica');
INSERT INTO Category VALUES('Arte');
INSERT INTO Category VALUES('Historia');
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
A equipa do SaborIntenso.com deseja-lhe um bom apetite!',NULL,'Culinaria','up201606334',0,0,'2018-08-12-12-12-12');

INSERT INTO Post VALUES('Lesão de Rafa pode evitar a saída de Zivkovic','Zivkovic estava na lista de saídas para o mercado de janeiro, uma vez que não tem sido muito utilizado por Rui Vitória. No entanto, a lesão contraída por Rafa, no último duelo, pode mudar os planos do emblema encarnado, de acordo com o jornal O Jogo, deste sábado.

O português de 25 anos sofreu uma rotura muscular na coxa esquerda, no jogo com o AEK, para a Liga dos Campeões, o que o deixará fora da competição até ao final de janeiro de 2019.

Nesse sentido, Zivkovic, que estava na lista de jogadores para negociar no mercado de transferências, terá de ficar e será uma opção para a ausência de Rafa.

Recorde-se que Rafa, que chegou ao Benfica na temporada 2016/17, vindo do Sporting de Braga, tem um contrato assinado com o clube até junho de 2021. ',NULL,'Desporto','Miguel',0,0,'2018-08-10-12-12-12');

INSERT INTO Post VALUES('Palocevic faz o segundo golo em Alvalade e agrava pesadelo do Sporting','O jogo entre Sporting e Nacional, referente à 13.ª jornada da I Liga, foi palco de muitas dificuldades para os leões. Depois de Camacho ter inaugurado o marcador, foi a vez de Palocevic fazer o gosto... à cabeça. O médio ofensivo sérvio respondeu da melhor maneira a um cruzamento de Jota e fez o segundo golo do Nacional em Alvalade (2-0).
Esta foi, de resto, a estreia de Palocevic a marcar no campeonato. 

O Porto vai aos Açores em altas jogar com o Santa Clara. Haverá goleada? Aposte 20€ sem risco e ganhe 68€ como o Porto vai ganhar por 2 - 1, 3 - 1 ou 4 - 1!

Sugestão para Múltipla de Sábado: Aposte 20€ sem risco e ganhe 117€ como o Porto, Juventus, Bayern, Dortmund e o At. Madrid vão ganhar! ',NULL,'Desporto','Miguel',0,0,'2018-08-10-12-13-12');

INSERT INTO Post VALUES('JOÃOZINHO','As melhores piadas do joãozinho

A professora de português pergunta para o Joãozinho na sala de aula:
– Na oração “O marido chega a casa de surpresa e encontra a esposa no quarto.”, onde está o sujeito?
– Se não estiver dentro do guarda-roupa, deve estar debaixo da cama!

Na escola a professora diz para Joãozinho dizer uma palavra que comece com a letra C, e ele responde:
– Vassoura.
– E aonde entra a letra C em vassoura?
– No cabo.

Joãozinho chega em casa e diz ao seu pai:
– Pai, hoje recebi as notas!
– Então onde estão elas? — disse o pai.
– Emprestei!
– Mas porquê?
– Porque meu amigo queria assustar o pai dele.

O professor pergunta para Joãozinho:
– Joãozinho, qual a idade do seu pai?
– Ele tem a mesma idade que eu – responde Joãozinho.
O professor surpreso questiona a resposta:
– Mas como isso é possível?
E Joãozinho responde:
– Bem, ele só virou pai no dia que eu nasci.

Joãozinho pergunta para sua mãe:
– Mãe, você sabia que o vermelho é cor do amor?
– Sei sim. Porquê?
– Amo-te! Olha aqui as minhas notas…

Joãozinho chega ao colégio… aí a Mariazinha atira uma bola de papel na cabeça dele e fala:
-”Head Shot”
Joãozinho pega o livro e acerta na cara da Mariazinha e diz:
-“HAHAHAHA FACE BOOK”!

Piadas do Joãozinho para rir com os amigos!

A professora pergunta:
– Porque você está coçando tanto a cabeça, Joãozinho?
O rapaz responde:
– É por causa de um piolho morto, fessora!
– Tudo isso por causa de um piolho morto?
Ele responde:
– É que os parentes dele vieram para o velório!

Joãozinho chegou muito atrasado à escola, e a professora perguntou:
– O que aconteceu?
– Fui atacado por um crocodilo!
– Oh, meu Deus! Como você está?
– Estou bem, mas o trabalho de matemática ele comeu todinho…

Num certo dia, a professora pergunta pro Joãozinho:
– O que você quer ser quando crescer, Joãozinho?
– Eu quero ser soldado fesôra.
– Mas você corre o risco de ser morto pelo inimigo.
– Então agora eu quero ser inimigo.

 ',NULL,'Comedia','Miguel',0,0,'2018-08-10-12-13-12');
INSERT INTO Post VALUES('PIADAS DE MORRER A RIR','Piadas de morrer a rir
Prepara-se para fantásticas piadas de morrer a rir!

O que é um pontinho amarelo na cozinha?
– Um yellowtrodoméstico

Fui no café e perguntei se o salgado era de hoje.
– Não é de ontem.
– E como faço pra comer o de hoje?
– Volte amanhã!

A professora chega para o Joãozinho e diz:
– Joãozinho qual é o tempo da frase: Eu procuro um homem fiel?
E então Joãozinho responde
– É tempo perdido!

Depois de um mês do nascimento do seu filho, Manel voltou na maternidade, com o bebê no colo:
– Doutor… O que está a aconteceu? Meu filho já nasceu faz um mês e nada de abrir o olho!
Depois de olhar para o garoto, que tinha cara de japonês, o médico diz:
– Seu Manel… Eu acho que quem tem que abrir os olhos é o senhor!

Dou aula de química e física, duas disciplinas pelas quais a maioria dos alunos tem aversão.
Um dia comentei, depois de uma das muitas badernas em classe:
– Eu ganho pouco, mas me divirto com vocês.
E um deles, para não perder a oportunidade, respondeu:
– Nós também, não aprendemos nada, mas nos divertimos muito.

Na delegacia
– Seu delegado meu marido saiu de casa ontem a noite, disse que ia comprar arroz e até agora não voltou. O que eu faço doutor?
– Sei lá, faz macarrão!!

Um homem sentou-se ao meu lado e me mostrou no celular uma foto da esposa dele e perguntou:
– Ela é bonita, não é?
Eu respondi:
– Se você acha que ela é bonita, deveria ver a minha namorada então.
O homem questionou:
– A sua namorada é tão bonita assim?
E eu respondi:
– Não, ela é oftalmologista.',NULL,'Comedia','Miguel',0,0,'2018-08-10-12-13-12');

INSERT INTO Post VALUES('Bruce Springsteen despede-se da Broadway e estreia-se no Netflix','Este sábado Bruce Springsteen sobe ao palco do pequeno teatro Walter Kerr, em Nova Iorque, pela 236.ª e última vez, dando por encerrada a série de espectáculos Springsteen on Broadway, que ali desenvolveu desde Outubro de 2017.

Mas nem tudo são más notícias. Esta sexta-feira foi lançado em todo o mundo um disco que capta o ambiente desse espectáculo acústico. E já a partir deste domingo o mesmo acontecimento poderá ser visionado na plataforma Netflix.

O teatro na Broadway onde decorreram as apresentações, uma sala de 960 lugares, é célebre pelo seu décor rosa e dourado. Aliás quando lançou a iniciativa, o músico disse ter escolhido a Broadway “por causa desses velhos teatros lindíssimos, que me pareceram ideais para o que eu tinha na cabeça”, observando que o teatro era “provavelmente a sala mais pequena” em que actuou “nos últimos 40 anos”. O espectáculo teve cinco apresentações por semana, de terça-feira a sábado.',NULL,'Musica','Miguel',0,0,'2018-08-10-12-13-12');
INSERT INTO Post VALUES('Quando Freddie Mercury era o tímido cantor dos The Hectics','Não se pode dizer que Freddie Mercury, que se celebrizou como cantor dos Queen, alguma vez tenha abandonado os holofotes da fama, mas dir-se-ia que depois da estreia de Bohemian Rhapsody, o filme sobre a sua vida e obra, que o interesse à sua volta voltou a ser fomentado.

Nos últimos dias ficou a saber-se que Bohemian Rhapsody, que estreou em Portugal no mês de Outubro, já é o filme biográfico musical mais rentável da história, gerando mais de 538 milhões de euros em receitas por todo o mundo, ultrapassando os 154 milhões só nos Estados Unidos. Desta forma o filme superou Straight Outta Compton, o filme biográfico sobre o grupo rap N.W.A., que gerou mais de 178 milhões de euros. E até Mamma Mia!, o filme de 1998 baseado nos suecos ABBA, já ficou para trás.

Acontece que a notícia surge poucos dias depois de se ter ficado a saber que Bohemian Rhapsody, o tema que dá o nome ao filme, ultrapassou o icónico tema dos anos 1990 do grupo Nirvana, Smells Like Teen Spirit, como a canção do século XX mais ouvida de sempre em streaming.

De tal forma o interesse à volta do cantor, que morreu em 1991, tem sido reacendido que voltam histórias que não se encontram no filme, nomeadamente sobre o seu passado antes de ter conhecido aqueles que viriam a ser os seus parceiros nos Queen. O filme começa com o encontro do cantor, então na faixa dos 20 anos, quando ainda se chamava Farrokh Bulsara, com Brian May e Roger Taylor, que viriam a ser o embrião dos Queen.',NULL,'Musica','Miguel',0,0,'2018-08-10-12-13-12');

INSERT INTO Post VALUES('Arte açoriana inaugurada no MUDAS','A exposição de Catarina Branco no MUDAS. Museu de Arte Contemporânea foi inaugurada este sábado, 15 de Dezembro, com a presença da secretária regional do Turismo e Cultura, Paula Cabaço.

É “mais uma iniciativa que se cumpre ao abrigo do Protocolo Bilateral de Cooperação entre a Madeira e os Açores, na área da cultura, o qual se tem revelado bastante positivo, ao reforçar a ligação entre estas duas Regiões Autónomas e ao potenciar, conjuntamente, o conhecimento, o intercâmbio e a maior valorização dos artistas e agentes culturais”, fez questão de destacar, na ocasião, a secretária regional.

“Quer através da realização de Exposições como esta que hoje se inaugura, quer mediante a materialização de outras iniciativas, nomeadamente ao nível do intercâmbio de publicações – com a Região a disponibilizar um conjunto de documentos à rede de Museus e à rede escolar dos Açores, ligadas à nossa história – ou do intercâmbio entre os artistas dos dois arquipélagos – que também já se verificou com a ida, este ano, da Banda Municipal do Funchal ‘Os Artistas’ aos Açores, depois da Madeira ter acolhido, no ano passado, uma Banda Filarmónica oriunda de Ponta Delgada, numa comitiva de quase 80 pessoas – este protocolo tem resultado e continuará a ser executado no futuro”, garantiu Paula Cabaço.

A governante lembrou ainda que, em 2019, o madeirense Hélder Folgado levará aos Açores a sua Exposição ‘Melancolia’, mostra que já se esteve no MUDAS, “espaço que funcionou não apenas como palco para a sua interacção com o público, mas, também, como local de residência artística”.',NULL,'Arte','Miguel',0,0,'2018-08-10-12-13-12');
INSERT INTO Post VALUES('Arte','Arte (do termo latino ars, significando técnica e/ou habilidade) pode ser entendida como a atividade humana ligada às manifestações de ordem estética ou comunicativa, realizada por meio de uma grande variedade de linguagens,[1] tais como: arquitetura, desenho, escultura, pintura, escrita, música, dança, teatro e cinema, em suas variadas combinações.[2] O processo criativo se dá a partir da percepção com o intuito de expressar emoções e ideias, objetivando um significado único e diferente para cada obra.[3]',NULL,'Arte','Miguel',0,0,'2018-08-10-12-13-12');

INSERT INTO Post VALUES('Sem a prisão e a preocupação pelas minorias eu não teria ido para História','Uma reprodução das Tentações de Bosch apresenta-se discreta numa das paredes do escritório de António Borges Coelho. A luz da manhã não chega a iluminá-la, só o campo de visão do historiador é capaz de a detectar entre centenas de livros de história, filosofia, poesia, ficção, arte e muitas fotografias de família. Bosch ao lado de Borges e de costas para a linha do mar da Parede onde vive, no canto, a que chama “o buraco” e se senta todos os dias para escrever. Aos 90 anos, o historiador, poeta, ficcionista, ex-militante do Partido Comunista, catedrático jubilado da Universidade de Lisboa que este ano o distinguiu com um prémio de carreira, é um leitor compulsivo de ficção e está a escrever o 7.º volume da sua História de Portugal. Fomos encontrá-lo a restabelecer-se de ser o centro das atenções. Prefere o silêncio dos livros, a rotina do café pela manhã, a leitura dos jornais e a concentração em tudo o que ainda tem para fazer. Falou mais do seu passado do que do seu presente, como quem faz a sua historiografia pessoal, a que o levou a ser o historiador António Borges Coelho, um homem que perdeu a fé num deus dogmático, num partido dogmático e se diz um céptico, até mesmo um manipulador. Com muito riso pelo meio.',NULL,'Historia','Miguel',0,0,'2018-08-10-12-13-12');
INSERT INTO Post VALUES('História','História (do grego antigo ἱστορία, transl.: historía, que significa "pesquisa", "conhecimento advindo da investigação")[1] é a ciência que estuda o ser humano e sua ação no tempo e no espaço concomitantemente à análise de processos e eventos ocorridos no passado. O termo "História" também pode significar toda a informação do passado arquivada em todas as línguas por todo o mundo, por intermédio de registos históricos.

A palavra história tem sua origem nas investigações de Heródoto; em grego antigo, o termo "História" é Ἱστορίαι (Historíai). Todavia, será Tucídides o primeiro a aplicar métodos críticos, como o cruzamento de dados e uso de diversas fontes diferentes. O estudo histórico começa quando o ser humano encontra os elementos de sua existência nas realizações dos seus antepassados. Esse estudo, do ponto de vista europeu, divide-se em dois grandes períodos: Pré-História e História.',NULL,'Historia','Miguel',0,0,'2018-08-10-12-13-12');

INSERT INTO Post VALUES('Acabou a crise política no Sri Lanka. O novo primeiro-ministro é... o antigo','Dois meses após ter sido destituído do cargo de primeiro-ministro do Sri Lanka, Ranil Wickremesinghe foi nomeado... para exatamente o mesmo cargo.

Wickremesinghe tomou posse este domingo, numa cerimónia à porta fechada que decorreu no gabinete do Presidente do país, Maithripala Sirisena, o mesmo que o tinha demitido.

A recondução no cargo do primeiro-ministro põe fim a um impasse político que se arrastava desde 26 de outubro, quando o Presidente substituiu o primeiro-ministro na sequência de diferenças pessoais e desacordos políticos.

Então, entrou para o cargo o antigo Presidente Mahinda Rajapaksa que se demitiu este sábado após falhar a obtenção de uma maioria no Parlamento, instituição que o atual Presidente dissolveu, a 11 de novembro, para evitar que se opusesse a estas alterações políticas.',NULL,'Politica','Miguel',0,0,'2018-08-10-12-13-12');
INSERT INTO Post VALUES('Milhares manifestam-se em Roma contra política de imigração','Milhares de manifestantes desfilaram este sábado em Roma, Itália, para protestar contra o que consideram uma política mais restritiva no acolhimento de imigrantes imposta pelo governo italiano.

A palavra de ordem do desfile, no qual participaram várias pessoas vestidas com coletes amarelos, era "Get up, Stand up, Stand up for your rights", [Levanta-te e defende os teus direitos, numa tradução livre] inspirado no título da célebre canção de Bob Marley.

"Começamos, nos últimos dois anos, a criminalizar aqueles que salvaram milhares de vidas no mar", as organizações humanitárias com os seus barcos próximos da costa libanesa "para chegarmos ao encerramento dos portos aos navios cheios de náufragos", denunciou o coletivo "Projeto Direitos", que reúne juristas e associações de defesa dos direitos humanos.',NULL,'Politica','Miguel',0,0,'2018-08-10-12-13-12');

INSERT INTO Post VALUES('Meteorologia. Saiba como vai estar o tempo esta sexta-feira','Para hoje, o Instituto Português do Mar e da Atmosfera prevê temperaturas mínimas no território continental a chegar aos 2º (na Guarda) e máximas a rondar os 17º (em Santarém, Setúbal e Faro).
Para esta sexta-feira, o IPMA prevê céu pouco nublado, com mais nebulosidade nas regiões Norte e Centro. Na região Sul, períodos de céu muito nublado, tornando-se pouco nublado a partir da tarde.

Há a possibilidade de ocorrência de períodos de chuva fraca ou aguaceiros fracos no litoral a norte do Cabo Carvoeiro até ao início da manhã, e no Minho no final do dia (com destaque para o distrito de Braga).

No nordeste transmontano e na Beira Alta existe ainda a possibilidade de formação de gelo ou geada.',NULL,'Metereologia','Miguel',0,0,'2018-08-10-11-13-12');
INSERT INTO Post VALUES('Meteorologia. Saiba como vai estar o tempo esta segunda-feira','Para esta segunda-feira, o IPMA prevê céu pouco nublado, com mais nebulosidade nas regiões Norte e Centro. Na região Sul, períodos de céu muito nublado, tornando-se pouco nublado a partir da tarde.

Há a possibilidade de ocorrência de períodos de chuva fraca ou aguaceiros fracos no litoral a norte do Cabo Carvoeiro até ao início da manhã, e no Minho no final do dia (com destaque para o distrito de Braga).

No nordeste transmontano e na Beira Alta existe ainda a possibilidade de formação de gelo ou geada.',NULL,'Metereologia','Miguel',0,0,'2018-08-10-12-13-12');

INSERT INTO Post VALUES('Significado de Ciência','O que é Ciência:
Ciência representa todo o conhecimento adquirido através do estudo ou da prática, baseando em princípios certos. Esta palavra deriva do latim scientia, sujo significado é "conhecimento" ou "saber".

Em geral, a ciência comporta vários conjuntos de saberes nos quais são elaboradas as suas teorias baseadas nos seus próprios métodos científicos.

A metodologia é essencial na ciência, assim como a ausência de preconceitos e juízos de valor. A ciência tem evoluído ao longo dos séculos. Galileu Galilei é considerado o pai da ciência moderna.

Ciência e tecnologia
A ciência está intimamente ligada com a área da tecnologia, porque os grandes avanços da ciência, hoje em dia, são alcançados através do desenvolvimento de novas tecnologias e do desenvolvimento das tecnologias já existentes.

Saiba mais sobre o significado da Tecnologia.

Ciências sociais
Estudam o comportamento humano, as relações humanas e o seu desenvolvimento em sociedade. Nelas estão incluídas áreas como a Antropologia, o Direito, a História, a Psicologia, a Sociologia, a Filosofia Social, a Economia Social, a Política Social, o Direito Social. 

As ciências sociais estudam as normas de convivência do homem e dos modos da sua organização social. O termo "ciência social" também é usado para designar o grupo formado pelas ciências do direito, sociologia e ciências políticas.

Veja mais sobre o significado de ciências sociais.',NULL,'Ciencia','Miguel',0,0,'2018-08-1-12-13-12');
INSERT INTO Post VALUES('Próxima cimeira do clima realiza-se em 2019 no Chile','A próxima cimeira do clima das Nações Unidas vai realizar-se no Chile no fim de 2019, decidiram esta sexta-feira os países presentes na cimeira que ainda decorre na Polónia.

O Brasil, que foi candidato à realização da COP25 até ao mês passado, retirou-se e justificou a decisão com “os atuais constrangimentos fiscais e orçamentais que se deverão manter no futuro próximo”.

A Costa Rica, que também foi um dos possíveis anfitriões da cimeira do ano que vem, será palco de uma reunião ministerial preparatória.

A realização das cimeiras do clima da ONU roda por várias regiões do globo e no próximo ano é a vez do grupo latino-americano e das Caraíbas.

Representantes de quase 200 países estão ainda na cidade polaca de Katowice reunidos na COP24 a tentar chegar a um texto final que permita pôr em prática os compromissos de redução de emissões de gases com efeito de estufa e contenção do aquecimento global assumidos em Paris em 2015.

Apesar de o fim da cimeira, que dura há duas semanas, estar previsto para esta sexta-feira, as negociações deverão continuar pelo menos até sábado.',NULL,'Ciencia','Miguel',0,0,'2018-08-11-12-13-12');

INSERT INTO Post VALUES('Draghi termina compras mas mostra preocupação com a economia',
'No dia em que reviu em baixa as previsões de crescimento e de inflação, o presidente do BCE confirmou que as compras líquidas de activos chegaram ao fim.
No mesmo dia em que confirmou que o BCE irá no final do ano concluir as compras líquidas de dívida pública com que tem estimulado a economia, Mário Draghi teve de apresentar novas projecções que apontam para uma revisão em baixa do crescimento do PIB e da taxa de inflação na zona euro em 2019. E, por isso, na conferência de imprensa que se seguiu à decisão, o presidente do BCE pareceu mais alguém que estava preocupado em dar mais apoios à economia do que alguém que, efectivamente, tinha acabado de retirar uma parte importante dos apoios até agora em vigor.

Ao fim de quatro anos e meio em que o Banco Central Europeu juntou ao seu balanço mais de 2,6 biliões de euros de activos (principalmente títulos de dívida pública emitidos pelos países da zona euro), o presidente da instituição confirmou aquilo que já se estava à espera. A partir de Janeiro já não serão feitas novas compras. Aquilo que o BCE vai passar a fazer é somente reinvestir o dinheiro que recebe quando os títulos que detém atingem a maturidade e são amortizados.

A medida era antecipada há vários meses e vinha sendo pedida há ainda mais tempo por aqueles que consideravam que o BCE estava a ir longe demais nos estímulos que dava à economia, arriscando um regresso das pressões inflacionistas. Mário Draghi e a maioria dos membros do conselho do BCE foram resistindo, reduzindo apenas progressivamente o volume de compras, mas, a partir do início deste ano, com a economia a crescer e a inflação a aproximar-se dos 2%, agendaram o final de 2018 como a data para o fim do programa.',NULL,'Economia','Miguel',0,0,'2018-08-13-12-13-12');
INSERT INTO Post VALUES('Eis as frases que marcaram 2018 na área da economia',
'As frases que marcaram o ano de 2018 traçam também um panorama sobre aquilo que aconteceu durante os últimos 12 meses, por figuras nacionais e também internacionais.

A agência Lusa selecionou as frases mais marcantes deste ano e o Notícias ao Minuto apresenta-lhe 30 frases dessa mesma seleção. ',NULL,'Economia','Miguel',0,0,'2018-08-14-12-13-12');

INSERT INTO Post VALUES('Diamantino” e “Aquaparque” nomeados para os Prémios Europeus de Cinema','Os filmes portugueses "Diamantino", de Gabriel Abrantes e Daniel Schmidt, e "Aquaparque", de Ana Moreira, estão entre os nomeados aos Prémios Europeus de Cinema que são entregues em Sevilha.

Partilhe

Gabriel Abrantes é o realizador do filme "Diamantino"
HAYOUNG JEON/EPA

Autor
Agência Lusa
Mais sobre
CINEMACULTURA
Os filmes portugueses “Diamantino”, de Gabriel Abrantes e Daniel Schmidt, e “Aquaparque”, de Ana Moreira, estão entre os nomeados aos Prémios Europeus de Cinema (EFA, na sigla inglesa), que são entregues este sábado em Sevilha, Espanha.

“Diamantino”, a primeira longa-metragem de ficção do português Gabriel Abrantes e do norte-americano Daniel Schmidt, está nomeado na categoria de Comédia Europeia, na qual competem também “O Espírito da Festa”, dos franceses Érice Toledano e Olivier Nakache, e “A Morte de Estaline”, do britânico Armando Iannucci.


“Aquaparque”, a estreia da atriz Ana Moreira na realização, está nomeado na categoria de Curta-Metragem Europeia, na qual competem mais 14 filmes.

A curta, cuja ação se desenrola num parque aquático abandonado, recebeu em julho o prémio Kino Sound Studio do Curtas de Vila do Conde.

“Diamantino” venceu em maio o Grande Prémio da Semana da Crítica do Festival de Cinema de Cannes.

O filme, ainda sem data de estreia em Portugal, conta a história de Diamantino, interpretado pelo ator Carloto Cotta, uma superestrela do futebol mundial, cuja carreira cai em desgraça.

Além de Carloto Cotta, o elenco desta coprodução entre Portugal, Brasil e França inclui Cleo Tavares, Anabela Moreira, Margarida Moreira, Carla Maciel, Filipe Vargas, Manuela Moura Guedes, Joana Barrios e Maria Leite.

Gabriel Abrantes e o norte-americano Daniel Schmidt têm trabalhado juntos nos últimos anos em filmes como “Tristes Monroes” (2017) e “A History of Mutual Respect” (2010).

PARTILHE
COMENTE
+Seja o primeiro a comentar
SUGIRA
Proponha uma correção, sugira uma pista: observador@observador.pt
RECOMENDAMOS
CINEMA
Macau. Filme sul-coreano "Clean Up" vence festival
14/12/2018, 17:46
CINEMA
Já há trailer para o filme de "Downton Abbey"
14/12/2018, 16:402.363
SARA SAMPAIO
A morte fica-lhes tão bem: Sara Sampaio na Paper
13/12/2018, 17:52
CINEMA
Quatro filmes para ver esta semana
13/12/2018, 6:31
CINEMA
"Roma": Alfonso Cuarón e a história da criada
★★★★★13/12/2018, 6:30165
ESPANHA
Filme "El reino" lidera nomeações para os Goya
12/12/2018, 20:07
POPULARES
LIVROS
Livros para o Natal (II) /premium
João Carlos Espada
Há uma hora
Cinco sugestões de livros de autores nacionais para o Natal — mas não para a ‘época festiva’ ou para as ‘férias da estação’, como mandam as actuais directivas politicamente correctas.

MÚSICA
Elas sim: as mulheres que cantaram o melhor Brasil /premium
16/12/2018, 10:03
MUSEUS
Explorar arte com 5 sentidos? Em Faro é possível
16/12/2018, 9:53
MÚSICA
Vivaldi por Bartoli, 20 anos depois /premium
15/12/2018, 16:54
ARTE
Quadro de Josefa de Óbidos vai ficar em Portugal
15/12/2018, 12:47
FIAT
O icónico Fiat 500 vai para o MoMA
15/12/2018, 12:15255
ÚLTIMAS
SISMO
Sismo de magnitude 2,7 sentido na zona de Évora 
Há 8 minutos
POLÍTICA
Geórgia. Oposição contesta vitória de Zurabishvilj
Há uma hora
FRANÇA
Edouard Philippe admite erros com coletes amarelos
Há uma hora
LIVROS
Livros para o Natal (II) /premium
João Carlos Espada
Há uma hora
Cinco sugestões de livros de autores nacionais para o Natal — mas não para a ‘época festiva’ ou para as ‘férias da estação’, como mandam as actuais directivas politicamente correctas.

FUTEBOL
Futebol português junta-se no apoio a Nuno Pinto
Há 2 horas256
SPORTING
Os números da "laranja mecânica" a verde e branco
Há 2 horas125

Reparámos que tem
um Ad Blocker ativo.
Considere desligá-lo
e apoiar o nosso trabalho
de outra forma:
Subscreva as nossas
Newsletters

Siga-nos no
Facebook
ÚLTIMAS / CULTURA
Livros para o Natal (II) /premium
00:07
Elas sim: as mulheres que cantaram o melhor Brasil /premium
10:03
Explorar arte com 5 sentidos? Em Faro é possível
09:53
Vivaldi por Bartoli, 20 anos depois /premium
15/12
Quadro de Josefa de Óbidos vai ficar em Portugal
15/12
  
Cinco ideias para postais de Natal sem preço
OPINIÃO

Como é bela a vida num país sem populismo /premium
Helena Matos
Ontem

Reino Unido está mais próximo do segundo referendo /premium
João Marques de Almeida
15 Dezembro

E você, já adoptou um migrante? /premium
Alberto Gonçalves
14 Dezembro

Uma Lei de Bases da Saúde pequenina
Francisco Goiana da Silva - Convidado
15 Dezembro

A Terra É De Quem a Trabalha
João Pires da Cruz - Convidado
Ontem

Uma lança em África /premium
P. Gonçalo Portocarrero de Almada
14 Dezembro

Precisamos da Esquerda
António Pedro Barreiro - Convidado
15 Dezembro

A direita poderia ganhar em 2019 /premium
Sebastião Bugalho
14 Dezembro

A insuportável leveza e cinismo das manas Mortágua /premium
José Manuel Fernandes
13 Dezembro

A carta (secreta) de António Costa ao Pai Natal /premium
Luís Reis
14 Dezembro

Os custos das escolhas estão aí /premium
Helena Garrido
13 Dezembro

Os problemas da Direita: a liderança
Fernando Leal da Costa - Convidado
15 Dezembro
MAIS POPULARES
Livros para o Natal (II) /premium
17 de Dezembro
Elas sim: as mulheres que cantaram o melhor Brasil /premium
16 de Dezembro
Explorar arte com 5 sentidos? Em Faro é possível
16 de Dezembro
Vivaldi por Bartoli, 20 anos depois /premium
15 de Dezembro
O icónico Fiat 500 vai para o MoMA
15 de Dezembro
',NULL,'Cinema','Miguel',0,0,'2018-07-10-12-13-12');
INSERT INTO Post VALUES('31º Prémios do Cinema Europeu | A cerimónia e os vencedores','Sem grande surpresa, ‘Cold War – Guerra Fria’, do polaco Pawel Pawlikowski confirmou-se como o favorito aos Prémios do Cinema Europeu, realizados em Sevilha. Ganhou praticamente todos os prémios para que estava nomeado. O cinema português mais uma vez, apesar das nomeações não ganhou nada.
Os academistas do cinema europeu renderam-se ao amor profundo, e à dolorosa história de separação de um belo casal de artistas (Joanna Kulig e Tomasz Kot, ambos candidatos aos prémios de interpretação), que viveram um complexo drama passional, em ‘Cold War-Guerra Fria’, o filme dirigido pelo polaco Pawel Pawlikowski (Varsóvia, 1957). Trata-se de um filme de amor e música, — anda perto do musical, entre o jazz e a música clássica — rodado a preto e branco e aparentemente inspirado na história verídica dos pais do realizador que viveram numa Europa ainda dividida e devastada pela barbárie, marcada pela separação e fuga de muitas famílias, mas também por dramas de paixões interrompidas e destroçadas; e sobretudo a história de um continente alastrado pela miséria e pelas incertezas do período após o final da II Guerra Mundial.
O facto é que o filme ganhou quase todos os prémios mais importantes, desta 31ª edição promovida pela Academia de Cinema Europeu: Melhor Filme, Melhor Realização, Melhor Argumento, além de que Joanna Kulig — está em Hollywood, grávida, sem poder viajar e portanto não estava na sala — que foi galardoada como Melhor Actriz Europeia.',NULL,'Cinema','Miguel',0,0,'2018-06-10-12-13-12');

INSERT INTO Post VALUES('
As 10 Atividades de lazer mais praticadas pelos brasileiros','Uma pesquisa da Target Group Index com 19.456 brasileiros com idades entre 12 e 64 anos, revelou quais são as atividades recreativas que os brasileiros mais praticam com frequência. Segue o Top 10:

1º. Ouvir música: 59% dos entrevistados praticam
2º. Reunir-se com os amigos: 34%
3º. Ler livros: 27%
4º. Ir a shopping centers: 24%
5º. Sair para caminhar: 19%
6º. Fotografia: 17%
7º. Jogar games (videogame ou no computador): 16%
8º. Cozinhar/ Atividades de culinária: 16%
9º. Ir a restaurantes/ Sair para jantar: 16%
10º. Sair para beber/ Ir a bares: 14%',NULL,'Lazer','Miguel',0,0,'2018-06-12-12-13-12');
INSERT INTO Post VALUES('Lazer – Definição e Tipos','Um dos conceitos de lazer pode ser o de se praticar alguma atividade prazerosa durante um determinado tempo do dia. Essas atividades podem ser desde ler um livro, ver TV, ouvir uma música, até dançar, fazer um cooper, jogar boliche, tênis…

O importante é que se pratique uma atividade de lazer ao, dia. Por quê? Em uma sociedade onde a globalização chegou muito rápido e junto com ela a tecnologia, a tendência de nós, seres humanos, é cada vez mais vivermos isolados e sozinhos, em frente ao mais famoso e discutido invento do homem: o microcomputador. Nem que seja durante uma hora, ou talvez, até minutos do dia, é necessário termos um momento em que possamos sentir prazer e/ou diversão por alguma coisa.

Lazer e turismo na história
O lazer e o turismo são fenômenos que vêm ganhando um peso cada vez maior no quotidiano da vida moderna. De elementos da vida aristocrática, reservados aos integrantes do topo da pirâmide sócieconômica das sociedades pré-modernas, o lazer e o turismo tornaram-se acessíveis a um público cada vez mais extenso, graças aos processos de democratização ocidental (como a Revolução Francesa e a Revolução Americana) e ao progresso tecnológico e organizacional, que aumentou a produtividade, reduziu custos e as jornadas de trabalho e elevou o nível de recursos disponíveis para consumo discricionário (inclusive de tempo) em mãos de camadas cada vez mais amplas da sociedade.

No século XX, o lazer e o turismo tornaram-se atividades de massas, trazendo à tona, assim, muitas oportunidades de novos negócios; e passaram a ser objeto de investimentos e administração profissionais. Após a Segunda Guerra, atingiram um patamar de crescimento que fez com que, do ponto de vista econômico, passassem a ser considerados como “indústrias”. Atualmente a indústria e os serviços ligados ao lazer e ao turismo estão entre os campeões de crescimento, alinhando-se seguramente entre os mais promissores para o futuro.

Definição de lazer
LazerA definição mais conhecida de lazer é do sociólogo francês Dumazedier. Este autor define lazer da seguinte maneira: “o lazer é um conjunto de ocupações às quais o indivíduo pode entregar-se de livre vontade, seja para repousar, seja para divertir-se, recrear-se e entreter-se, ou ainda, para desenvolver sua informação ou formação desinteressada, sua participação social voluntária ou sua livre capacidade criadora após livrar-se ou desembaraçar-se das obrigações profissionais, familiares e sociais”.

Mas atualmente, especialistas como Prof. Valmir José Oleias falam que:

o lazer tem sido, historicamente, uma atividade necessária ao desenvolvimento bio-psíquico-social do homem;
o lazer está relacionado à disponibilidade do tempo livre;
o lazer diz respeito mais diretamente às classes privilegiadas pela sua situação sócieconômica;
por fim, a prática do lazer é influenciada, sobretudo pelo Estado, na medida em que este pode implementar políticas públicas para o setor, além de oferecer espaços físicos necessários e adequados para a sua execução.
Tipos de lazer
Lazer doméstico: atividades prazerosas que podem ser realizadas dentro do próprio lar e que proporcionam interação e diversão da família. Ex: olhar TV, jogos de tabuleiro, navegar na internet.

Lazer turístico: abrange viagens e passeios com o propósito de relaxar e conhecer novos ares, está intimamente relacionado a férias.  Ex: excursões pelo país, reconhecimento de interiores do estado, cruzeiros.

Lazer trabalhista: é a atividade realizada em determinado tempo vago que é dado ao trabalhador, geralmente as grandes empresas dão aos servidores 15 min para lancharem e realizaram estas atividades. Ex: ver tv, conversar com os outros funcionários tranquilamente, fazer ioga ou academia.

Lazer escolar: pode ser visto no recreio dos alunos ou na aula de Ed. Física, além disso, em aulas práticas de todas as matérias. Ex: exposição de pintura na aula de Artes, interclasse, show de talentos, festivais esportivos.

Conclusão
O lazer é uma atividade de extrema importância para o ser humano, uma vez que ele se envolve com muitas atividades obrigatórias e cansativas (trabalho, estudo) e merece um momento de descanso, tranquilidade e diversão.

Este momento é acompanhado de diversas atividades as quais chamamos LAZER. O lazer é uma atividade prazerosa que deve fazer parte do seu cotidiano, mas não dominá-lo, ou seja, o lazer é bem-vindo mas não pode ser o centro de sua vida.

Como exemplo de lazer podemos dar desde olhar tv até fazer um cruzeiro. O lazer varia de acordo com a classe social, pois cada um realiza o que lhe proporciona felicidade e está ao seu alcance.',NULL,'Lazer','Miguel',0,0,'2018-08-20-12-13-12');

INSERT INTO Post VALUES('As 50 obras essenciais da literatura portuguesa','Os Lusíadas de Luís de Camões continua a ser a obra mais importante da literatura nacional. Em seguida, o Livro do Desassossego de Fernando Pessoa (heterónimo Bernardo Soares) é aquela que os especialistas mais apreciam. Quais serão então as outras obras essenciais dos nossos escritores?

O DN quis apurar quais são as 50 obras essenciais da literatura nacional desde o seu início e chegou a uma conclusão com a ajuda de vários entendidos na matéria. Primeiro, elaborou-se uma lista com 80 autores. Com o crivo do especialista em literatura portuguesa Miguel Real fez-se a primeira versão. Em seguida, a escolha foi confrontada com várias opiniões de entendidos em autores e áreas. Foram ouvidos António Mega Ferreira, Francisco Vale, Isabel Alçada, Isabel Pires de Lima, Manuel Alberto Valente, Maria Alzira Seixo, Nuno Júdice, Pedro Mexia, Viale Moutinho e Zeferino Coelho.

Por fim, acertadas as melhores obras de cada um, eliminados alguns autores e acrescentados outros, chegou-se à versão final. Que foi de novo ao crivo de outro especialista na nossa literatura, Fernando Pinto de Amaral. A versão final só foi obtida ao fim de um mês.
A escolha final está assim dividida: as 25 obras essenciais em todos os géneros; os dez melhores ensaios; as cinco melhores peças de Teatro e os dez livros de Poesia mais importantes.

Eis a lista:

Os Lusíadas, Camões
Livro do Desassossego, Fernando Pessoa
Sermões, Padre António Vieira
Os Maias, Eça de Queiroz
Cancioneiros Medievais (Cantigas de Amigo e de Amor)
Crónica de D. João I, Fernão Lopes
Peregrinação, Fernão Mendes Pinto
Memorial do Convento, José Saramago
Viagens na Minha Terra, Almeida Garrett
A Brasileira de Prazins, Camilo Castelo Branco
Sôbolos Rios que Vão, António Lobo Antunes
A Sibila, Agustina Bessa-Luís

Sonetos, Antero de Quental

Húmus, Raul Brandão
Livro Sexto, Sophia de Mello Breyner Andresen
Menina e Moça, Bernardim Ribeiro

Mau Tempo no Canal, Vitorino Nemésio

A Arte de Ser Português, Teixeira de Pascoaes
A Casa Grande de Romarigães, Aquilino Ribeiro

Sinais de Fogo, Jorge de Sena

Aparição, Vergílio Ferreira Aparição

O Delfim, José Cardoso Pires

Uma Abelha na Chuva, Carlos de Oliveira

Maina Mendes, Maria Velho da Costa
Uma Viagem à Índia, Gonçalo M. Tavares



Poesia
Obra Poética, Sá de Miranda

Poesia, Bocage

O Livro, Cesário Verde

Só, António Nobre
Clepsidra, Camilo Pessanha
Poemas de Deus e do Diabo, José Régio

As Mãos e os Frutos, Eugénio de Andrade
Pena Capital, Mário Cesariny

A Colher na Boca, Herberto Helder
Toda a Terra, Ruy Belo




Teatro

O Auto da Barca do Inferno, Gil Vicente
A Castro, António Ferreira

Auto do Fidalgo Aprendiz, Francisco Manuel de Melo
Guerras de Alecrim e Manjerona, António José da Silva
O Judeu, Bernardo Santareno

Ensaio
Leal Conselheiro, Rei D. Duarte
Quod nihil scitur, Francisco Sanches
O Verdadeiro Método de Estudar, Luís António Verney
Portugal Contemporâneo, Oliveira Martins
A Ideia de Deus, Sampaio Bruno
Ensaios, António Sérgio

Ir À Índia Sem Sair de Portugal, Agostinho da Silva

O Labirinto da Saudade, Eduardo Lourenço
Tratado da Evidência, Fernando Gil
O Erro de Descartes, António Damásio',NULL,'Literatura','Miguel',0,0,'2018-12-10-12-13-12');
INSERT INTO Post VALUES('Os 10 romances mais importantes da literatura brasileira','As listas são um instrumento crítico de grande relevância, pois trazem, subjacente, um conceito de literatura — este conceito talvez seja mais importante do que as obras escaladas. Ao escolher apenas dez romances brasileiros eternos, segui alguns critérios: não repetiria livros do mesmo autor; privilegiaria obras que trouxeram alguma inovação formal; e daria preferência a livros que fossem mais do que uma história, que tivessem um valor metonímico, representando um período literário, um painel histórico, um grupo social, uma tendência estética. Podem ser considerados como marcas comuns a todas as narrativas listadas o desejo de construir um retrato do Brasil e o investimento em uma linguagem identitária — cada título, logicamente, à sua maneira. Teríamos aqui então um pequeno mapa do grande romance nacional.',NULL,'Literatura','up201606334',0,0,'2018-11-10-12-13-12');

INSERT INTO Post VALUES('7 novas tecnologias que irão revolucionar o mundo','Tentamos todos os dias imaginar o futuro próximo com as tecnologias que tão bem conhecemos. Mas, e se pensarmos nas tecnologias que ainda não conhecemos tão bem?

Consegue imaginar-se com estas 7 ideias revolucionárias?

futuretec


Impressão 3D
As impressoras 3D vieram para ficar. Esta nova tecnologia tem ajudado e muito nos últimos tempos, sendo agora implementada na área da saúde. No entanto, e apesar de não estar completamente implementada nesta área, a tecnologia de impressão 3D já está a dar cartas nas mais diversas áreas.

3dcar

Desde o design de peças de roupa, mobiliário, casas e até chocolate. Mas, o que se calhar nunca imaginou foi, ter um carro feito por uma impressora 3D. Mas ele já existe, a Divergent Microfactories criou o Blade, e podemos adiantar desde já aos mais aficionados que este carro vai dos 0 aos 97 km/h em apenas 2,2 segundos.

 

Extracção de água atmosférica
Esta tecnologia funciona de forma simples, uma micro-rede “apanha” a água e humidades que estão presentes na atmosfera. Depois disso, a água é escorrida para um tanque que será então distribuída pela canalização ou armazenada.

A ideia surgiu para fazer frente à falta de água em alguns locais dos Estados Unidos. Esses locais abastecem, por exemplo, em cerca de 98% toda a produção de alfaces no país. Sem a extracção de água, a produção tornava-se extremamente complicada em algumas alturas do ano.

fogquest

Há já uma empresa, a FogQuest, a trabalhar com esta inovação em países como Etiópia, Nepal, Chile, Marrocos entre outros. Podemos então esperar que num futuro próximo, a falta de água não seja um problema para a produção de bens alimentares.

 

Usáveis/implantáveis
Já conhecemos os óculos inteligentes e de realidade aumentada. Temos alguns exemplos como os Google Glass entre outros. Este é apenas o início de uma realidade que teremos dentro de poucos anos.

Nas próximas décadas, deixaremos de usar o telemóvel como hoje o conhecemos e em vez disso vamos passar a ter apenas uma lente de contacto inteligente e uns auscultadores. Iremos interagir com o mundo a partir do nosso olho.

google-glass

A tecnologia de que falamos não está assim tão longe, já foi aliás criada no Centro de Tecnologia de Microssistemas da Universidade de Ghent. Estamos então perante uma situação em que teremos toda a informação de forma instantânea no nosso campo visual.

 

Transhumanismo
Em todas as gerações os seres humanos sofrem alterações. Essas melhorias fazem com que estejamos a sofrer de transhumanismo. Por muito que não queiramos, é estimado que em 2035 a grande maioria dos seres seja exactamente um transhumano.

Vamos melhorar quer a nível cerebral quer físico. Teremos melhorias exoesqueléticas controladas somente pela nossa cabeça, híper inteligência e até os músculos irão melhorar.

transhumanismo

Nesta nova espécie, iremos tratar e substituir qualquer problema que tenhamos com uma facilidade, agora assustadora.

 

“Quintas verticais cor-de-rosa”
Estamos na era tecnológica e a agricultura também irá sofrer alterações. Em 2050 prevê-se que tudo seja diferente nesta área, quer pelas razões climáticas mas também pela centralização da população.

Estas quintas verticais, não são mais do que uma plantação de alimentos orgânicos num local com luz LED azul e vermelha. Assim, os ambientes são controlados e todos os alimentos são livres de pesticidas.

organic-farm

A luz LED é escolhida por ser mais fria e eficiente, mas não só. Estás luzes começam a ser extremamente baratas e acessíveis. Sendo esperado um aumento exponencial na utilização desta iluminação. Não é de estranhar que esta venha a ser a tecnologia utilizada nas futuras quintas.

Estas quintas, ganharão uma maior dimensão em 2025, onde poderemos assistir a uma presença constante destes locais nas nossas cidades.

 

Inteligência Artificial
Os robôs fazem cada vez mais parte da nossa vida e o futuro passa pelos robôs industriais de multi-propósito. Estes vão substituir-nos sempre que necessitamos de sair do nosso local de trabalho.

Está previsto que em 2016 exista um aumento significativo do uso de robôs, quer no trabalho quer em casa que servirão para ser nossos ajudantes em qualquer local e em qualquer tarefa.

Inteligencia-artificial

A inteligência artificial irá invadir o mundo e será possivelmente a tecnologia que chegará mais rapidamente às nossas vidas.

 

Reversão da Idade Biológica
Será em 2025 que iremos conhecer os primeiros progressos nesta área. Filmes já existem, mas nesta área já há bem mais do que simples filmes. As pesquisas já estão avançadas e houve até resultados ao reverter as linhas de células humanas.

Outros estudos também já conseguiram reverter a idade de músculos em animais de laboratório. Por estas e outras razões, espera-se que estará para breve a junção destes dois estudos. Muito em breve podemos escolher se queremos ou não ficar mais novos, sem cirurgias estéticas, apenas à distância de um comprimido.

reversaoidade

Estas serão as 7 evoluções tecnológicas que hoje nos podem assustar mas que serão o nosso amanhã.',NULL,'Novas tecnologias','Miguel',0,0,'2018-10-10-12-13-12');
INSERT INTO Post VALUES('Novas tecnologias provocam mudanças a todos os níveis','maginar como estaremos no futuro é praticamente impossível, mas a tecnologia desempenhará um papel central. O ritmo da inovação tecnológica continua a acelerar. Neste momento, nós atingimos um patamar tecnológico que nos vai permitir dar mais um salto quântico na forma como a tecnologia está presente nas nossas vidas.

As novas tecnologias são responsáveis por enormes transformações resultantes dos impactos significativos no modo de produção e de gestão das organizações, que provocaram a alteração dos seus processos e estruturas hierárquicas, tornando-as mais ágeis e reduzindo custos. Os impactos provocados pelo uso da tecnologia no ambiente das organizações é algo de imensurável.Com o surgimento dos smartphones e tablets, as típicas funcionalidades de um telemóvel foram integradas através de um conjunto de aplicações. O objetivo das apps é proporcionar aos utilizadores uma função específica, que tanto pode ser uma ferramenta de melhoria de produtividade, como um serviço específico de entretenimento.

As apps pretendem facilitar a vida aos utilizadores, proporcionando-lhes um acesso direto a variadíssimos serviços.

Destacamos aqui um serviço que certamente vai melhorar a vida, neste caso, de pessoas com diabetes. Falamos da nova APP MÓVEL ONETOUCH REVEAL( R ).

LifeScan lançou esta nova app gratuita que trabalha com os medidores OneTouch Select Plus Flex e OneTouch Verio Flex através da ligação por bluetooth, para ajudar as pessoas com diabetes a gerir a sua glicemia. A app organiza a informação pessoal dos níveis de glicemia em gráficos simples e coloridos que proporcionam informação adequada para ajudar as pessoas com diabetes a manterem o controlo entre visitas ao seu profissional de saúde.

Os medidores OneTouch Select Plus Flex e OneTouch Verio Flex incluem um Indicador de Intervalo Objetivo com 3 cores, que ajuda a que os doentes compreendam rapidamente se estão ou não no objetivo. Tudo isto num design fino e compacto, com números grandes e fáceis de ler. Os limites de intervalo-objetivo predefinidos podem alterar-se para atender às necessidades específicas de cada doente.',NULL,'Novas tecnologias','Miguel',0,0,'2018-01-10-12-13-12');





--COMMIT TRANSACTION;
