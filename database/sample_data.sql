-- Sample Data for MadridKH
-- Version 1.0

USE `madridkh`;

-- Insert sample articles in English
INSERT INTO `articles` (`id`, `title`, `content`, `language`, `category`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Real Madrid Wins Champions League', 'Real Madrid secured their 15th Champions League title after a thrilling final against Borussia Dortmund. The match ended 2-1 after extra time with goals from Vinicius Jr. and Rodrygo. This victory marks another historic achievement for the club.', 'en', 'Matches', 'assets/images/articles/champions-league.jpg', '2025-05-28 20:00:00', '2025-05-28 20:00:00'),
(2, 'New Signing: Kylian Mbappé Joins Real Madrid', 'After months of speculation, Kylian Mbappé has finally signed for Real Madrid on a free transfer from Paris Saint-Germain. The French forward is expected to make his debut next season and will wear the number 9 jersey.', 'en', 'Transfers', 'assets/images/articles/mbappe.jpg', '2025-06-01 10:00:00', '2025-06-01 10:00:00'),
(3, 'Vinicius Jr. Named Best Player of the Season', 'Vinicius Junior has been awarded the Best Player of the Season award after his outstanding performances throughout the campaign. The Brazilian winger scored 25 goals and provided 18 assists in all competitions.', 'en', 'Players', 'assets/images/articles/vinicius.jpg', '2025-05-20 15:00:00', '2025-05-20 15:00:00'),
(4, 'Behind the Scenes: Training at Valdebebas', 'Take a look behind the scenes at Real Madrid\'s training ground, Valdebebas. Our exclusive video shows the daily routines of the players as they prepare for upcoming matches.', 'en', 'Videos', 'assets/images/articles/training.jpg', '2025-05-15 09:00:00', '2025-05-15 09:00:00');

-- Insert sample articles in Khmer
INSERT INTO `articles` (`id`, `title`, `content`, `language`, `category`, `image`, `created_at`, `updated_at`) VALUES
(5, 'រៀលម៉ាឌ្រីដ ឈ្នះ តំណាង​អឺរ៉ុប', 'រៀលម៉ាឌ្រីដ បានឈ្នះ តំណាង​អឺរ៉ុប លើកទី 15 បន្ទាប់ពីការប្រកួតប្រជែងដ៏រំភើបមួយប្រឆាំងនឹង បូរុសស៊ី ឌូសែលឌើក។ ការប្រកួតប្រជែងបានបញ្ចប់ដោយលទ្ធផល 2-1 បន្ទាប់ពីពេលវេលាបន្ថែម ដោយមាន វីនីស៊ីញូស ជូនីអរ និង រូឌ្រីហ្គោ សុទ្ធភាព។ ជ័យជម្នះនេះគឺជាសញ្ញាថ្មីមួយទៀតសម្រាប់ក្លឹប។', 'km', 'Matches', 'assets/images/articles/champions-league.jpg', '2025-05-28 20:00:00', '2025-05-28 20:00:00'),
(6, 'ការ​ចូល​រួម​ថ្មី: គីលីយ៉ង់ ម៊ាប៉េ ចូល​រួម​រៀល​ម៉ាឌ្រីដ', 'បន្ទាប់ពីការសង្ស័យរយៈពេលយូរ គីលីយ៉ង់ ម៊ាប៉េ បានចុះហត្ថលេខាចូលរួមរៀលម៉ាឌ្រីដដោយឥតគិតថ្លៃពី ប៉ារីស សាំង-ហ្គែរ៉េម៉ង់។ អ្នក​លេង​បាល់​ជើង​បារាំង​នេះ​នឹង​ធ្វើ​ការ​បង្ហាញ​ជំនាញ​ដំបូង​របស់​គាត់​នៅ​រដូវ​កាល​ក្រោយ និង​នឹង​ពាក់​អាវ​លេខ​9។', 'km', 'Transfers', 'assets/images/articles/mbappe.jpg', '2025-06-01 10:00:00', '2025-06-01 10:00:00'),
(7, 'វីនីស៊ីញូស ជូនីអរ ត្រូវបានគេ​ជ្រើសរើស​ឲ្យ​ជា​អ្នក​លេង​ល្អ​បំផុត​នៃ​រដូវ​កាល', 'វីនីស៊ីញូស ជូនីអរ ត្រូវបានគេ​ជ្រើសរើស​ឲ្យ​ជា​អ្នក​លេង​ល្អ​បំផុត​នៃ​រដូវ​កាល បន្ទាប់ពីការ​បង្ហាញ​ដ៏​ល្អ​ឥត​ខ្ចោះ​របស់​គាត់​រយៈពេល​ទៅ​រដូវ​កាល។ អ្នក​លេង​បាល់​ជើង​ប្រេស៊ីល​នេះ​បាន​សិន​បាល់​បាន​ 25 ដង និង​បាន​ជួយ​សុទ្ធភាព​បាន​ 18 ដង​នៅ​ក្នុង​ការ​ប្រកួត​ប្រជែង​ទាំង​អស់។', 'km', 'Players', 'assets/images/articles/vinicius.jpg', '2025-05-20 15:00:00', '2025-05-20 15:00:00'),
(8, 'ពី​ក្ behind the scenes: ការ​ឈ្លុះ​ឈ្មោល​នៅ​វ៉ាល់ដែបែស', 'មក​មើល​ពី​ក្ដៅ​ក្រោយ​ឆាក​នៅ​ទី​ឈ្លុះ​ឈ្មោល​របស់​រៀល​ម៉ាឌ្រីដ វ៉ាល់ដែបែស។ វីដេអូ​ពិសេស​របស់​យើង​បង្ហាញ​ពី​របៀប​ប្រចាំ​ថ្ងៃ​របស់​អ្នក​លេង​នៅ​ពេល​ពួក​គេ​រៀប​ចំ​សម្រាប់​ការ​ប្រកួត​ប្រជែង​ដែល​កើត​ឡើង។', 'km', 'Videos', 'assets/images/articles/training.jpg', '2025-05-15 09:00:00', '2025-05-15 09:00:00');
