SELECT
    hacker_id,
    name,
    SUM(MAX_SCORE) AS TOTAL_SCORE
FROM (
    SELECT
        H.hacker_id,
        H.name,
        S.challenge_id,
        MAX(S.score) AS MAX_SCORE
    FROM
        Hackers H
        JOIN Submissions S ON S.hacker_id = H.hacker_id
    GROUP BY
        H.hacker_id,
        H.name,
        S.challenge_id
) AS tmp
GROUP BY
    hacker_id,
    name
HAVING
    TOTAL_SCORE > 0
ORDER BY
    TOTAL_SCORE DESC,
    hacker_id;
