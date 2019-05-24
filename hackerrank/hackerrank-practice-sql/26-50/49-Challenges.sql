-- Get the max challenges
SET @MAX_CHALLENGES = (SELECT COUNT(challenge_id) FROM Challenges GROUP BY hacker_id ORDER BY COUNT(challenge_id) DESC LIMIT 1);

-- Get all the records
SELECT
    H.hacker_id,
    H.name,
    COUNT(C.challenge_id) AS CHALLENGES_COUNT
FROM
    Hackers H
    JOIN Challenges C ON C.hacker_id = H.hacker_id
GROUP BY
    H.hacker_id,
    H.name
HAVING
    CHALLENGES_COUNT IN (
        -- Valid number of challenges
        SELECT
            CHALLENGES_SUB_COUNT
        FROM
             (SELECT COUNT(challenge_id) CHALLENGES_SUB_COUNT FROM Challenges GROUP BY hacker_id) tmp
        GROUP BY
            CHALLENGES_SUB_COUNT
        HAVING
            COUNT(CHALLENGES_SUB_COUNT) = 1
            OR  (
                COUNT(CHALLENGES_SUB_COUNT) > 1
                AND CHALLENGES_SUB_COUNT = @MAX_CHALLENGES
            )
    )
ORDER BY
    CHALLENGES_COUNT DESC,
    H.hacker_id;