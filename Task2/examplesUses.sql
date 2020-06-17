/*
Пример создания чата
Возможные сценарии работы:
-- Пользователь создает переписку с другим пользователем
    Chat name - Название чата (Ограничение 100 символов)
        Отображаеться имя пользователя с которым общение или название чата(Если задано).
    К данной переписке привязываеться два пользователя (члена переписки, member)
        тот кто создает переписку и вторая сторона
-- Чат для большого количества пользователей
*/
INSERT INTO chat(name) VALUES ('Общение 5');
INSERT INTO member (chat_id, user_id)
    VALUES (LAST_INSERT_ID(),4),
           (LAST_INSERT_ID(),3);
/*
 Так как в таблице chat primary key auto increment мы можем использовать функцию LAST_INSERT_ID()
 user_id - пользователи между которыми создана переписка
 */
/*
 Подготовителные действия выше
 Запрос при отправке сообщения от Человека 1 Человеку 2
 */
SELECT @member_id := member.id AS member_id FROM chat
    INNER JOIN member ON chat.id = member.chat_id
    INNER JOIN users ON member.user_id = users.id
    WHERE chat_id = 1 AND users.id = 3;
INSERT INTO messages (content, member_id) VALUES ('Все отлично!', @member_id);

/*
 Запрос на получение истории переписки между Ч1 и Ч2
    необходимо указать чат в котором переписка двух польвателей
 */
SELECT messages.id, messages.content, users.username,messages.update_at FROM messages
    INNER JOIN member ON messages.member_id = member.id
    INNER JOIN chat on member.chat_id = chat.id
    INNER JOIN users on member.user_id = users.id
    WHERE chat.id = 1
    ORDER BY messages.id;


/*
 Запрос на получение списка всех диалогов, в которых участвует Ч1, с
сортировкой по последнему полученному сообщению (аналог как список чатов в
любом мессенджере) и с отображением участника диалога
 */
SELECT chat.name,messages.content,messages.update_at, users.username FROM chat
    INNER JOIN member ON chat.id = member.chat_id
    INNER JOIN messages on member.id = messages.member_id
    INNER JOIN users ON member.user_id = users.id
    WHERE users.id = 3
    ORDER BY messages.update_at DESC
    LIMIT 1;


/*
 Запрос на удаление одного сообщения в истории переписки
 */


DELETE FROM messages WHERE messages.id = 4;

/*
 Запрос на удаление всей истории переписки с пользователем
 */

DELETE messages.* FROM messages
    INNER JOIN member ON messages.member_id = member.id
    INNER JOIN chat on member.chat_id = chat.id
    where chat.id = 1;

