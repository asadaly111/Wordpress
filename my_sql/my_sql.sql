-- SELECT MULTIPLE META's
SELECT 
a.ID, a.post_title, a.post_date,
b.meta_value,
c.meta_value as vlue
FROM preyeeee_posts as a 
INNER JOIN preyeeee_postmeta as b ON a.ID = b.post_id
INNER JOIN preyeeee_postmeta as c ON a.ID = b.post_id
WHERE b.meta_key = "ad_type" AND b.meta_value = "featured" AND a.post_type = "ad" AND c.meta_key = "ad_days"
GROUP BY a.ID

-- Take out min and max price from meta value through categories
SELECT 
a.object_id,a.term_taxonomy_id,
MIN(b.meta_value) as minprice,
MAX(b.meta_value) as maxprice,
AVG(b.meta_value) as avgprice
FROM wp_term_relationships AS a
INNER JOIN wp_postmeta as b ON a.object_id = b.post_id
WHERE a.term_taxonomy_id = 8 AND b.meta_key = "cs_price"


SELECT 
a.meta_id,
a.post_id,
a.meta_key,
a.meta_value
FROM wp_postmeta as a 
WHERE a.meta_key = "product_api_id" AND NOT EXISTS(
	SELECT 
	b.meta_value
	FROM wp_postmeta as b 
	WHERE a.post_id = b.post_id AND b.meta_key = "cron_date_update" AND b.meta_value = "'.date("d-m-Y").'"
)
LIMIT 20




-- count every month data
	SELECT Year(created), Month(created), Count(*) as count
	FROM yourttable
	WHERE created >= CURDATE() - INTERVAL 1 YEAR
	GROUP BY Year(created), Month(created)



	-- Get sale report by year month 
	SELECT YEAR(`paymentdate`) as SalesYear,
MONTH(`paymentdate`) as SalesMonth,
SUM(`amount`) AS TotalSales
FROM user_payments
GROUP BY YEAR(paymentdate), MONTH(paymentdate)
ORDER BY YEAR(paymentdate), MONTH(paymentdate) 

-- By year and month
SELECT 
SUM(`amount`) AS TotalSales
FROM user_payments
where year(paymentdate) = 2019
GROUP BY MONTH(paymentdate)