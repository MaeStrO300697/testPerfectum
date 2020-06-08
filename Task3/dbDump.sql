create table users
(
    id       bigint auto_increment
        primary key,
    email    varchar(255) not null,
    username varchar(255) not null
);

create table comment
(
    id      bigint auto_increment
        primary key,
    content text   not null,
    user_id bigint not null,
    constraint comment_users_id_fk
        foreign key (user_id) references users (id)
);

