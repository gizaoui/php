
CREATE TABLE Article (
    id SERIAL PRIMARY KEY,
    title VARCHAR(100),
    content TEXT,
    createdAt TIMESTAMP
);

INSERT INTO Article(title, content, createdAt) VALUES 
('Premier article', 'Contenu du premier article', '2024-08-20 12:15:32'),
('Second article', 'Contenu du second article', '2024-08-21 12:15:32'),
('Troisième article', 'Contenu du troisième article', '2024-08-20 12:15:32');
