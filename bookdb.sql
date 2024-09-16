-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 05:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_uname` varchar(255) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_no` int(11) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_uname`, `admin_email`, `admin_no`, `admin_password`) VALUES
(1, 'Salina', 'salina@email.com', 12345, 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_category` varchar(50) NOT NULL,
  `book_price` decimal(10,2) NOT NULL,
  `book_pic` varchar(100) NOT NULL,
  `book_stock` int(11) NOT NULL,
  `book_desc` longtext NOT NULL,
  `book_sold` int(11) NOT NULL,
  `book_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `book_category`, `book_price`, `book_pic`, `book_stock`, `book_desc`, `book_sold`, `book_year`) VALUES
(1, 'Salina - A. Samad Said', 'Literature', '36.00', 'book0.png', 15, 'Penceritaan novel Salina ini dapat digambarkan dengan watak Siti Salina seorang pelacur yang menyara dan memelihara Abdul Fakar yang malas bekerja yang sering meminta duit daripada Siti Salina.<br><br>\r\nAbdul Fakar seorang yang kaki mabuk, kaki perempuan dan suka memukul dan meminta duit daripada Siti Salina. Walaupun Siti Salina sering dipukul oleh Abdul Fakar, dia tetap menyayangi Abdul Fakar kerana wajah Abdul Fakar seiras dengan wajah arwah kekasihnya, Muhamad Yusuf yang mati akibat perang dunia kedua. Pada asalnya Siti Salina seorang anak yang kaya, namun akibat perang dunia kedua yang mengakibatkan kematian ahli keluarganya dan kehilangan harta bendanya, dia terpaksa menyara dirinya dengan menjadi pelacur. Selain itu, novel Salina ini juga dapat dilihat konflik yang berlaku pada watak Nahidah yang dipaksa oleh ibu tirinya untuk menjadi pelayan demi memenuhi kemahuan ibu tirinya yang ingin hidup mewah malah Nahidah juga sering diusik oleh Abdul Fakar tanpa pengetahuan ibu tirinya dan Siti Salina.<br><br>\r\nAtas hasutan Abdul Fakar, Zarina telah menghalau Sunarto dan Mansur yang kerap disindir oleh ibu tirinya telah meninggalkan rumah untuk memasuki tentera. Hal ini menyebabkan Abdul Fakar semakin berani untuk mengusik Nahidah sehingga dia berjaya memperkosa Nahidah pada suatu malam sewaktu Nahidah pulang membasuh baju. Setelah diperkosa oleh Abdul Fakar dan Cik Salim, Nahidah telah lari meninggalkan Singapura dan kemudiannya berkahwin dengan seorang buruh dan menetap di Pulau Pinang. Hilmy berasa sedih akan pemergian Nahidah manakala Siti Salina setelah dinasihati oleh Katijah turut meninggalkan Abdul Fakar dan berhijrah ke Kelantan. Abdul Fakar kemudiannya kembali belayar setelah gagal mencari Siti Salina dan menyesal akan perbuatannya terhadap Siti Salina.', 25, 2019),
(2, 'The Use and Abuse of Art - Jacques Barzun', 'Art', '107.00', 'book5.png', 4, 'The lecturer traces the historical development of attitudes toward the arts over the past 150 years, suggesting that the present is a period of cultural liquidation, nothing less than the ending of the modern age that began with the Renaissance.', 11, 1975),
(3, ' A Room of One’s Own - Virginia Woolf', 'Fiction', '35.00', 'book2.png', 3, '<b>A Room of One\'s Own grew out of a lecture that Virginia Woolf had been invited to give at Girton College, Cambridge in 1928 and became a landmark work of feminist thought.</b><br><br>Covering everything from why a woman must have money and a room of her own if she is to write, to authors such as Jane Austen, Aphra Behn and the Brontë sisters, and the tragic story of Shakespeare\'s fictional sister Judith, it remains a passionate assertion for female creativity and independence in a world dominated by men.', 3, 2015),
(4, 'A Painter of Our Time - John Berger', 'Non-Fiction', '54.00', 'book3.png', 3, 'Exiled in London, the Hungarian artist Janos Lavin disappears one day, into thin air. His journal offers his friend John the only clues to where he has gone, and why. John Berger\'s first novel is a passionate exploration of the artistic process, and a gripping detective story.', 2, 2017),
(5, 'A Guide for The Perplexed - E. F. Schumacher', 'Motivation', '72.00', 'book4.png', 3, 'From one of the most influential thinkers of the 20th century, and the author of the international bestseller Small Is Beautiful, the reissue of a timeless treatise on the meaning of living.<br><br>\r\nIn A Guide for the Perplexed, bestselling author E. F. Schumacher explores our relation to the world: our obligations--to other people, to the earth, to progress and technology, but most importantly to ourselves. If man can fulfill these obligations, then and only then can he enjoy a truly authentic relationship with the world--and truly know the meaning of living.<br><br>\r\nSchumacher argues that we need maps: a \"map of knowledge\" and a \"map of living.\" The concern of the mapmaker is to find for everything its proper place. For things out of place tend to get lost; they become invisible and their proper places are filled by other things that should not be there at all and therefore serve to mislead.<br><br>\r\nA Guide for the Perplexed teaches us to be our own map makers in following our destined path in life\'s journey.', 29, 2015),
(6, 'East & West - Rene Guenon', 'Non-Fiction', '92.00', 'book6.png', 23, 'This book investigates differences between East and West in connection with the preservation of traditional principles, with a special view to envisioning how such differences affect the possibilities for the restitution of such principles in each domain. Special attention is given to various aberrant \'spiritualities\' in the West, and how they might be overcome by reference to teachinigs still extant in the East, and a rejuvenation of what remains in the West of organizations retaining at least a core of the metaphysical teachings that were in full bloom in the medieval West.', 6, 2001),
(7, 'Once and Forever - Kenji Miyazawa', 'Literature', '75.00', 'book7.png', 3, 'Kenji Miyazawa is one of modern Japan’s most beloved writers, a great poet and a strange and marvelous spinner of tales, whose sly, humorous, enchanting, and enigmatic stories bear a certain resemblance to those of his contemporary Robert Walser. John Bester’s selection and expert translation of Miyazawa’s short fiction reflects its full range from the joyful, innocent “Wildcat and the Acorns,” to the cautionary tale “The Restaurant of Many Orders,” to “The Earthgod and the Fox,” which starts out whimsically before taking a tragic turn. Miyazawa also had a deep connection to Japanese folklore and an intense love of the natural world. In “The Wild Pear,” what seem to be two slight nature sketches succeed in encapsulating some of the cruelty and compensations of life itself.', 8, 2018),
(9, 'A History of Islam in 21 Women - Hossein Kamaly', 'History', '59.00', 'book8.png', 5, 'Beginning in seventh-century Mecca and Medina, A History of Islam in 21 Women takes us around the globe, through eleventh-century Yemen and Khorasan, and into sixteenth-century Spain, Istanbul and India. From there to nineteenth-century Persia and the African savannah, to twentieth-century Russia, Turkey, Egypt and Iraq, before arriving in present-day Europe and America.<br><br>From the first believer, Khadija, and the other women who witnessed the formative years of Islam, to award-winning architect Zaha Hadid in the twenty-first century, Hossein Kamaly celebrates the lives and groundbreaking achievements of these extraordinary women in the history of Islam.', 2, 2019),
(16, 'Under Your Wings - Tiffany Tsao', 'Fiction', '45.00', '3462-Under your Wings.png', 2, '<b>A powerful and evocative literary thriller from a stunning new Australian voice, for fans of Donna Tartt and Alice Sebold.</b><br><br>\r\nGwendolyn and Estella have always been as close as sisters can be. Growing up in a wealthy, powerful and sometimes treacherous family, they’ve relied on each other for support and confidence. Now, though, Gwendolyn is lying in a coma, the sole survivor of Estella’s poisoning of their whole family. What in their dark and complicated past has brought them to this point?<br><br>\r\nAs Gwendolyn struggles to regain consciousness, she desperately retraces her memories, trying to uncover the moment that led to this brutal act. Their aunt’s supposed death at sea; Estella’s unhappy marriage to the brutish Leonard; the shifting loyalties and unspoken resentments at the heart of the opulent world they inhabit – one by one, the facts float up, forcing Gwendolyn to confront the truth about who she and her sister really are, and the secrets in their family’s past.<br><br>\r\nTravelling from the luxurious world of the rich and powerful in Jakarta to the most spectacular shows at Paris Fashion Week, from the coasts of California to the melting pot of Melbourne’s university scene, Under Your Wings is a powerful, evocative and deeply compelling novel about the secrets that can build a family empire - and then ultimately bring it crashing down.', 1, 2018),
(17, 'Against Method - Paul Feyerabend', 'Philosophy', '112.00', '4170-Against method.png', 3, ' Paul Feyerabend’s globally acclaimed work, which sparked and continues to stimulate fierce debate, examines the deficiencies of many widespread ideas about scientific progress and the nature of knowledge. Feyerabend argues that scientific advances can only be understood in a historical context. He looks at the way the philosophy of science has consistently overemphasized practice over method, and considers the possibility that anarchism could replace rationalism in the theory of knowledge.\r\n<br><br>\r\nThis updated edition of the classic text includes a new introduction by Ian Hacking, one of the most important contemporary philosophers of science. Hacking reflects on both Feyerabend’s life and personality as well as the broader significance of the book for current discussions. ', 0, 2010),
(18, 'Malakalis - Hafiz Hamzah', 'Literature', '20.00', '8125-Malakalis.png', 3, 'Kumpulan sajak tulisan Hafiz Hamzah. Kumpulan sajak ini berada dalam senarai pendek  Hadiah Sastera Perdana Malaysia 2014.', 0, 2017),
(19, 'Muara', 'Literature', '50.00', '5151-Muara.png', 3, '', 0, 2021),
(20, 'A History of Solitude - David Vincent', 'History', '155.00', '8516-A history of Solitude.png', 3, 'Solitude has always had an ambivalent status: the capacity to enjoy being alone can make sociability bearable, but those predisposed to solitude are often viewed with suspicion or pity.<br><br>\r\n\r\nDrawing on a wide array of literary and historical sources, David Vincent explores how people have conducted themselves in the absence of company over the last three centuries. He argues that the ambivalent nature of solitude became a prominent concern in the modern era. For intellectuals in the romantic age, solitude gave respite to citizens living in ever more complex modern societies. But while the search for solitude was seen as a symptom of modern life, it was also viewed as a dangerous pathology: a perceived renunciation of the world, which could lead to psychological disorder and anti-social behaviour.<br><br>\r\n\r\nVincent explores the successive attempts of religious authorities and political institutions to manage solitude, taking readers from the monastery to the prisoner’s cell, and explains how western society’s increasing secularism, urbanization and prosperity led to the development of new solitary pastimes at the same time as it made traditional forms of solitary communion, with God and with a pristine nature, impossible. At the dawn of the digital age, solitude has taken on new meanings, as physical isolation and intense sociability have become possible as never before. With the advent of a so-called loneliness epidemic, a proper historical understanding of the natural human desire to disengage from the world is more important than ever.<br><br>\r\n\r\nThe first full-length account of its subject, A History of Solitude will appeal to a wide general readership.', 0, 2020),
(21, 'The Price of Peace - Zachary D. Carter', 'Select...', '165.00', '6125-The Price of Peace.png', 3, 'At the dawn of World War I, a young academic named John Maynard Keynes hastily folded his long legs into the sidecar of his brother-in-law’s motorcycle for an odd, frantic journey that would change the course of history. Swept away from his placid home at Cambridge University by the currents of the conflict, Keynes found himself thrust into the halls of European treasuries to arrange emergency loans and packed off to America to negotiate the terms of economic combat. The terror and anxiety unleashed by the war would transform him from a comfortable obscurity into the most influential and controversial intellectual of his day—a man whose ideas still retain the power to shock in our own time.<br><br>\r\n\r\nKeynes was not only an economist but the preeminent anti-authoritarian thinker of the twentieth century, one who devoted his life to the belief that art and ideas could conquer war and deprivation. As a moral philosopher, political theorist, and statesman, Keynes led an extraordinary life that took him from intimate turn-of-the-century parties in London’s riotous Bloomsbury art scene to the fevered negotiations in Paris that shaped the Treaty of Versailles, from stock market crashes on two continents to diplomatic breakthroughs in the mountains of New Hampshire to wartime ballet openings at London’s extravagant Covent Garden. <br><br>\r\n\r\nAlong the way, Keynes reinvented Enlightenment liberalism to meet the harrowing crises of the twentieth century. In the United States, his ideas became the foundation of a burgeoning economics profession, but they also became a flash point in the broader political struggle of the Cold War, as Keynesian acolytes faced off against conservatives in an intellectual battle for the future of the country—and the world. Though many Keynesian ideas survived the struggle, much of the project to which he devoted his life was lost. <br><br>\r\n\r\nIn this riveting biography, veteran journalist Zachary D. Carter unearths the lost legacy of one of history’s most fascinating minds. The Price of Peace revives a forgotten set of ideas about democracy, money, and the good life with transformative implications for today’s debates over inequality and the power politics that shape the global order.', 0, 2020),
(22, 'Design and Crime - Hal Foster', 'Art', '81.00', '1199-Design and Crime.png', 3, 'In these diatribes on the marketing of culture and the branding of identity, the development of spectacle--architecture and the rise of global cities, Hal Foster surveys our new political economy of design. Written in a lively style, \"Design and Crime\" explores the historical relations of modern art and modern museum, the conceptual vicissitudes of art history and visual studies, the recent travails of art criticism, and the double aftermath of modernism and postmodernism in an attempt to illuminate the conditions for critical culture in the present.', 0, 2011),
(23, 'Underground Asia - Tim Harper', 'History', '209.00', 'Underground Asia.png', 3, 'The story of the hidden struggle waged by secret networks around the world to destroy European imperialism.<br><br>\r\n\r\nThe end of Europe\'s empires has so often been seen as a story of high politics and warfare. In Tim Harper\'s remarkable new book the narrative is very different: it shows how empires were fundamentally undermined from below. Using the new technology of cheap printing presses, global travel and the widespread use of French and English, young radicals from across Asia were able to communicate in ways simply not available before. These clandestine networks stretched to the heart of the imperial metropolises: to London, to Paris, to the Americas, but also increasingly to Moscow.<br><br>\r\n\r\nThey created a secret global network which was for decades engaged in bitter fighting with imperial police forces. They gathered in the great hubs of Asia - Calcutta, Singapore, Batavia, Hanoi, Tokyo, Shanghai, Canton and Hong Kong - and plotted with ceaseless ingenuity, both through persuasion and terrorism, the end of the colonial regimes. Many were caught and killed or imprisoned, but others would go on to rule their newly independent countries.<br><br>\r\n\r\nDrawing on an amazing array of new sources, Underground Asia turns upside-down our understanding of twentieth-century empire. The reader enters an extraordinary world of stowaways, false identities, secret codes, cheap firearms, assassinations and conspiracies, as young Asians made their own plans for their future.', 24, 2020),
(24, 'The Art of Cinema - Jean Cocteau', 'Art', '78.00', 'The Art of Cinema.png', 4, 'Jean Cocteau (1889-1963) was a poet, a novelist, a playwright, an artist, an impresario, dandy and socialite. Friend to many of the most daringly original and socially dazzling fgures to be found in Paris at the height of its fame in the early part of this century as the teeming centre of the modernist world, Cocteau collaborated with such luminaries as Picasso, Stravinsky, Satie and Diaghilev. Jean Cocteau was only a small child when the Lumiere brothers first demonstrated their remarkable new invention, moving pidures, and his own artistic development coincided with that of the twentieth century\'s most important new medium. When given the chance to make his first film (The Blood of the Poet) in 1931, Cocteau embraced the new medium with the originality and verve that were his hallmark.<br><br>\r\n\r\nOver the next thirty years, up to the time of his last film (The Testament of Orpheus) in 1960, Cocteau made eight films, wrote essays on the cinema and film criticism which bore witness to his passionate affair with the moving image. This collection of his writings on film illuminates Cocteau\'s own work for the cinema, with detailed discussions of his aims, responses to criticism and his reflections on the relationship between cinema and theatre. Among several occasional pieces, Cocteau comments on the movie stars he admires - Marlene Dietrich, Brigitte Bardot, James Dean and Robert Montgomery - as well as the achievements of such great directors as Chaplin and Orson Welles.<br><br>\r\n\r\nThe final section in this volume contains what is perhaps the most remarkable and unique material, offering insights into the mind of a visual poet through the previously unpublished synopses of unrealized film projects. Cocteau\'stwo screenplays The Blood of a Poet and The Testament of Orpheus are published together by Marion Boyars under the title Two Screenplays.', 5, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_username` varchar(255) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_password` varchar(255) NOT NULL,
  `cust_phone` int(11) NOT NULL,
  `cust_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_username`, `cust_email`, `cust_password`, `cust_phone`, `cust_address`) VALUES
(3, 'Salmah', 'salmah@email.com', 'abc123', 123456, 'Lot 1370, Jalan Klinik Desa, Kampung Pauh Sembilan 16350 Bachok Kelantan'),
(4, 'test', 'test@email.com', 'abc1234', 123456, 'Kota Bharu, Kelantan');

-- --------------------------------------------------------

--
-- Table structure for table `manage_order`
--

CREATE TABLE `manage_order` (
  `order_id` int(11) NOT NULL,
  `order_price` decimal(10,2) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_order`
--

INSERT INTO `manage_order` (`order_id`, `order_price`, `order_quantity`, `order_date`, `order_status`, `book_id`, `cust_id`) VALUES
(18, '36.00', 1, '2022-01-17', 'Out for delivery', 1, 3),
(19, '72.00', 1, '2022-01-17', 'Delivered', 5, 3),
(20, '35.00', 1, '2022-01-12', 'Preparing', 3, 3),
(21, '107.00', 2, '2022-01-18', 'Delivered', 2, 3),
(22, '92.00', 1, '2022-01-18', 'Delivered', 6, 3),
(23, '92.00', 1, '2022-01-18', 'Preparing', 6, 3),
(24, '107.00', 3, '2022-01-18', 'Out for delivery', 2, 3),
(25, '72.00', 2, '2022-01-18', 'Delivered', 5, 3),
(26, '36.00', 12, '2022-01-19', 'Shipped out', 1, 3),
(27, '59.00', 2, '2022-01-19', 'Out for delivery', 9, 4),
(28, '54.00', 1, '2022-01-19', 'Shipped out', 4, 4),
(29, '209.00', 1, '2022-01-19', 'Out for delivery', 23, 3),
(30, '72.00', 1, '2022-01-19', 'Preparing', 5, 3),
(31, '72.00', 4, '2022-01-27', '', 5, 3),
(32, '45.00', 1, '2022-01-28', '', 16, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `manage_order`
--
ALTER TABLE `manage_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manage_order`
--
ALTER TABLE `manage_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `manage_order`
--
ALTER TABLE `manage_order`
  ADD CONSTRAINT `manage_order_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `manage_order_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
