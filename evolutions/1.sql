-- in this model, the delimiter "-- !" will differ ups from downs.
-- It should have no spaces before or after the delimiter

CREATE TABLE trainers (
    id INTEGER,
    nome TEXT,
    sobrenome TEXT,
    idade INTEGER
);

-- !

DROP TABLE trainers;