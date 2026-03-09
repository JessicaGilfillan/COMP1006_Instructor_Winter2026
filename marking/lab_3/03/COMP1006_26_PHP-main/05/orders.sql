CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL,
  phone VARCHAR(150) NOT NULL,
  item VARCHAR(50) NOT NULL,
  quantity INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  -- first_name, last_name, address, email, phone, chaos_croissant, midnight_muffin, existential_eclair, procrastination_cookie, finals_week_brownie, victory_cinnamon_roll, comments
);