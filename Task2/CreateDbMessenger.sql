/*
 Author: Artemii Karkusha
 MySQL 5.6

 Запросы на создание всех таблиц в вашей базе данных
 */

create table chat
(
    id   bigint auto_increment
        primary key,
    name varchar(100) null
);

create table users
(
    id       bigint auto_increment
        primary key,
    username varchar(64) not null
);

create table member
(
    id      bigint auto_increment
        primary key,
    chat_id bigint not null,
    user_id bigint not null,
    constraint member_chat_id_fk
        foreign key (chat_id) references chat (id),
    constraint member_users_id_fk
        foreign key (user_id) references users (id)
);

create table messages
(
    id        bigint auto_increment
        primary key,
    content   text                                not null,
    member_id bigint                              not null,
    create_at timestamp default CURRENT_TIMESTAMP not null,
    update_at timestamp default CURRENT_TIMESTAMP not null on update CURRENT_TIMESTAMP,
    constraint messages_member_id_fk
        foreign key (member_id) references member (id)
);


/*
 Test Data
 Table users
 */

INSERT INTO users (id, username) VALUES (1, 'Oleg');
INSERT INTO users (id, username) VALUES (2, 'Artemii');
INSERT INTO users (id, username) VALUES (3, 'Oleksandr');
INSERT INTO users (id, username) VALUES (4, 'Sasha');
INSERT INTO users (id, username) VALUES (5, 'Boris');
INSERT INTO users (id, username) VALUES (6, 'Pasha');
INSERT INTO users (id, username) VALUES (7, 'Vova');
INSERT INTO users (id, username) VALUES (8, 'Oleg');
INSERT INTO users (id, username) VALUES (9, 'Artemii');
INSERT INTO users (id, username) VALUES (10, 'Oleksandr');
INSERT INTO users (id, username) VALUES (11, 'Sasha');
INSERT INTO users (id, username) VALUES (12, 'Boris');
INSERT INTO users (id, username) VALUES (13, 'Pasha');
INSERT INTO users (id, username) VALUES (14, 'Vova');
/*
 Table Chat
 */
INSERT INTO chat (id, name) VALUES (1, 'Общение Гуру');
INSERT INTO chat (id, name) VALUES (2, 'Общение 2');
INSERT INTO chat (id, name) VALUES (3, 'Общение 3');
INSERT INTO chat (id, name) VALUES (4, 'Общение 4');
INSERT INTO chat (id, name) VALUES (5, 'Общение 4');
INSERT INTO chat (id, name) VALUES (6, 'Общение 5');
/*
 Table Member
 */
INSERT INTO member (id, chat_id, user_id) VALUES (1, 1, 3);
INSERT INTO member (id, chat_id, user_id) VALUES (2, 1, 4);
INSERT INTO member (id, chat_id, user_id) VALUES (3, 2, 1);
INSERT INTO member (id, chat_id, user_id) VALUES (4, 2, 5);
INSERT INTO member (id, chat_id, user_id) VALUES (5, 3, 2);
INSERT INTO member (id, chat_id, user_id) VALUES (6, 3, 6);
INSERT INTO member (id, chat_id, user_id) VALUES (7, 4, 3);
INSERT INTO member (id, chat_id, user_id) VALUES (8, 4, 6);
INSERT INTO member (id, chat_id, user_id) VALUES (9, 5, 3);
INSERT INTO member (id, chat_id, user_id) VALUES (10, 5, 6);
INSERT INTO member (id, chat_id, user_id) VALUES (11, 6, 4);
INSERT INTO member (id, chat_id, user_id) VALUES (12, 6, 3);
/*
 Table Messages
 */
 INSERT INTO messages (id, content, member_id, create_at, update_at) VALUES (1, 'Доброе утро босс.', 1, '2020-06-07 22:35:16', '2020-06-07 22:36:42');
INSERT INTO messages (id, content, member_id, create_at, update_at) VALUES (2, 'Доброе утро Саша.', 2, '2020-06-07 22:35:16', '2020-06-07 22:36:42');
INSERT INTO messages (id, content, member_id, create_at, update_at) VALUES (3, 'Хорошего дня', 2, '2020-06-07 22:35:16', '2020-06-07 22:36:42');
INSERT INTO messages (id, content, member_id, create_at, update_at) VALUES (4, 'И вам тоже шеф.', 1, '2020-06-07 22:35:16', '2020-06-07 22:36:42');
INSERT INTO messages (id, content, member_id, create_at, update_at) VALUES (5, 'Как продвигается работа??', 2, '2020-06-07 22:35:16', '2020-06-07 22:39:15');
INSERT INTO messages (id, content, member_id, create_at, update_at) VALUES (10, 'Хай', 3, '2020-06-07 23:21:24', '2020-06-07 23:21:24');
INSERT INTO messages (id, content, member_id, create_at, update_at) VALUES (11, 'Привет', 4, '2020-06-07 23:21:24', '2020-06-07 23:21:24');
INSERT INTO messages (id, content, member_id, create_at, update_at) VALUES (12, 'Как дела?', 3, '2020-06-07 23:21:24', '2020-06-07 23:21:24');
INSERT INTO messages (id, content, member_id, create_at, update_at) VALUES (13, 'Все отлично!', 1, '2020-06-07 23:23:36', '2020-06-07 23:23:36');

