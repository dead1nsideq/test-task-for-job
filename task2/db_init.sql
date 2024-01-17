INSERT INTO click (ip, referer, user_agent)
VALUES
    ('192.168.1.1', 'http://example.com/page1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
    ('10.0.0.1', 'http://example.com/page2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
    ('255.0.0.255', 'http://example.com/page3', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'),
    ('172.16.0.1', 'http://example.com/page4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');


INSERT INTO actions (event_date, click_id, created_at, updated_at)
VALUES
    ('2024-01-17 12:00:00', 1, NOW(), NOW()),
    ('2024-01-17 12:30:00', 2, NOW(), NOW()),
    ('2024-01-17 13:00:00', 3, NOW(), NOW());
