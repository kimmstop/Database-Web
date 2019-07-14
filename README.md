# Database-Web
#xampp를 이용하여 apache, php, mysql을 연동하였습니다.

사진을 포함한 모든 php파일들을 xampp1의 htdocs에 저장하시면 됩니다. 가장 기본 웹 페이지는 index.php입니다.
mysql에서 데이터베이스의 이름은 "project"입니다.
create table user (Uid varchar(20), Password varchar(20), Address varchar(40), Point int, Name varchar(5), primary key(Uid));
create table vip (Vid varchar(20), Uid varchar(20), primary key(Vid,Uid));
create table category (Bcategory varchar(20), primary key(Bcategory));
create table book (Bid int auto_increment, Bpoint int, Price int, Bcategory varchar(20), Bname varchar(20), State int, R_date date, B_date date, R_Uid varchar(20), B_Uid varchar(20), 
		primary key(Bid), foreign key(B_Uid) references user(Uid),
		foreign key(R_Uid) references user(Uid),
		foreign key(Bcategory) references category(Bcategory));
create table evaluation (Bid int , Num_of_Good int, 
		primary key(Bid, Num_of_Good),
		foreign key (Bid) references book(Bid));
create table author(Bid int , Author_name varchar(20),
		primary key(Bid,Author_name),
		foreign key (Bid) references book(Bid));

이렇게 테이블을 만들어줍니다.
홈페이지에서 회원가입을 한 후 "책 등록 하기" 를 통해서 책을 등록하시면 됩니다. 
