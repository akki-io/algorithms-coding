SELECT
    SUM(C2.POPULATION)
FROM
    COUNTRY C1
    JOIN CITY C2 ON C2.COUNTRYCODE = C1.CODE
WHERE
    C1.CONTINENT = 'Asia';