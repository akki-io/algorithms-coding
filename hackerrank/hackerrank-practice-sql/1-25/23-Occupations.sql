SET @doctor=0, @professor=0, @singer =0, @actor=0;
SELECT
    MAX(Doctor),
    MAX(Professor),
    MAX(Singer),
    MAX(Actor)
FROM (
    SELECT
        CASE Occupation
            WHEN 'Doctor' THEN @doctor:=@doctor+1
            WHEN 'Professor' THEN @professor:=@professor+1
            WHEN 'Singer' THEN @singer:=@singer+1
            WHEN 'Actor' THEN @actor:=@actor+1 END AS lineNumber,
        CASE WHEN Occupation = 'Doctor' THEN Name END AS Doctor,
        CASE WHEN Occupation = 'Professor' THEN Name END AS Professor,
        CASE WHEN Occupation = 'Singer' THEN Name END AS Singer,
        CASE WHEN Occupation = 'Actor' THEN Name END AS Actor
    FROM OCCUPATIONS ORDER BY Name
     ) tmp
GROUP BY
    lineNumber;