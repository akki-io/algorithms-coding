SET @REPEAT = 0;
SELECT
    REPEAT('* ', @REPEAT := @REPEAT + 1)
FROM
    information_schema.tables
WHERE
    @REPEAT < 20;
