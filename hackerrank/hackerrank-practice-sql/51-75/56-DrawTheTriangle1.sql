SET @REPEAT = 21;
SELECT
    REPEAT('* ', @REPEAT := @REPEAT - 1)
FROM
    information_schema.tables
WHERE
    @REPEAT > 0;
