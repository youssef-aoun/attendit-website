USE `isd-entities`;

-- Event 1: Music Concert
INSERT INTO Event (title, date, time, location, description, organizer_id, number_of_seats, category_id)
VALUES
('Music Concert', '2024-05-15', '19:00', 'City Arena', 'Enjoy an evening of live music featuring local bands and artists', 1, 500, 1),
('Tech Conference', '2024-06-20', '09:00', 'Convention Center', 'Join industry experts and innovators for discussions on the latest trends and advancements in technology', 1, 500, 1),
('Food Festival', '2024-07-10', '12:00', 'Central Park', 'Indulge in a variety of culinary delights from around the world, including street food, gourmet dishes, and desserts', 1, 500, 1),
('Fitness Workshop', '2024-08-05', '08:30', 'Fitness Center', 'Get motivated and learn new fitness techniques in this interactive workshop led by certified trainers', 1, 500, 1),
('Art Exhibition', '2024-09-15', '10:00', 'Art Gallery', 'Explore a diverse collection of paintings, sculptures, and installations by emerging and established artists', 1, 500, 1);


UPDATE Event
SET image = 'C:\\Users\\YoussefAoun\\OneDrive - Bitify PTY LTD\\Desktop\\Uni stuff\\ISD\\Attend-It\\Backend\\Attend-It\\events_images\\music-concert.jpg'
WHERE title = 'Music Concert';

UPDATE Event
SET image = 'C:\\Users\\YoussefAoun\\OneDrive - Bitify PTY LTD\\Desktop\\Uni stuff\\ISD\\Attend-It\\Backend\\Attend-It\\events_images\\tech-conference.webp'
WHERE title = 'Tech Conference';

UPDATE Event
SET image = 'C:\\Users\\YoussefAoun\\OneDrive - Bitify PTY LTD\\Desktop\\Uni stuff\\ISD\\Attend-It\\Backend\\Attend-It\\events_images\\food-festival.webp'
WHERE title = 'Food Festival';

UPDATE Event
SET image = 'C:\\Users\\YoussefAoun\\OneDrive - Bitify PTY LTD\\Desktop\\Uni stuff\\ISD\\Attend-It\\Backend\\Attend-It\\events_images\\fitness-workshop.jpg'
WHERE title = 'Fitness Workshop';

UPDATE Event
SET image = 'C:\\Users\\YoussefAoun\\OneDrive - Bitify PTY LTD\\Desktop\\Uni stuff\\ISD\\Attend-It\\Backend\\Attend-It\\events_images\\art-exhibition.jpg'
WHERE title = 'Art Exhibition';