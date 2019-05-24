SELECT
    IF(G.Grade < 8, "NULL", S.Name),
    G.Grade,
    S.Marks
FROM
    Students S
        JOIN Grades G ON S.Marks >= G.Min_Mark AND S.Marks <= G.Max_Mark
ORDER BY
    G.Grade DESC,
    S.Name,
    S.Marks;