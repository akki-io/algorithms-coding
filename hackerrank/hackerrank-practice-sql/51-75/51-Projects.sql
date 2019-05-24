SELECT
    Start_Date,
    MIN_END_DATE
FROM (
    SELECT
        Start_Date,
        MIN(End_Date) AS MIN_END_DATE
    FROM
        (SELECT Start_Date FROM Projects WHERE Start_Date NOT IN (SELECT End_Date FROM Projects)) a,
        (SELECT End_Date FROM Projects WHERE End_Date NOT IN (SELECT Start_Date FROM Projects)) b
    WHERE
        Start_Date < End_Date
    GROUP BY
        Start_Date
    ) tmp
ORDER BY
    DATEDIFF(MIN_END_DATE, Start_Date),
    Start_Date;