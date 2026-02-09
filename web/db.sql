-- jolly_rogers table
CREATE TABLE jolly_rogers (
    id INTEGER PRIMARY KEY,
    pirate TEXT NOT NULL,
    flag TEXT NOT NULL, -- Path to the flag image
    secret TEXT,        -- The secret key needed to decrypt the final flag
    restricted BOOLEAN  -- 1 for Joyboy Pirates, 0 for others
);

-- poneglyph table
CREATE TABLE poneglyph (
    encrypted_flag TEXT NOT NULL
);

-- Insert Data (Example)
INSERT INTO jolly_rogers (id,pirate, flag, secret, restricted) VALUES
(1, 'Straw Hat Pirates', 'luffy_flag.png', NULL, 0),
(2, 'Red Hair Pirates', 'shanks_flag.png', NULL, 0),
(3, 'Whitebeard Pirates', 'whitebeard_flag.png', NULL, 0),
(4, 'Joyboy Pirates', 'flag1.png', 'erased_from_history_by_world_government', 1); 

INSERT INTO poneglyph (encrypted_flag) VALUES
('ZyeuSlh2emZrVdlQeWJvalF6gmFuamJ3fmKyY25san1Rft1Qf2VrUX1vjn1ubnp9UWWLUH1iZ2pRaYhhf3h8d3M='); -- This is 'Let The Wisdom Of Ohara Guide 
