-- ********* SQL練習問題 – 問58
----- 全ての選手の所属国と名前、背番号を表示
SELECT
    C.NAME,
    P.NAME,
    P.UNIFORM_NUM
FROM
    COUNTRIES C
    JOIN PLAYERS P
    ON P.COUNTRY_ID = C.ID;

-- ********* SQL練習問題 – 問59
----- 全ての試合の国名と選手名、得点時間を表示してください。オウンゴール（player_idがNULL）は表示
SELECT
    C.NAME,
    P.NAME,
    G.GOAL_TIME
FROM
    COUNTRIES C
    JOIN PLAYERS P
    ON C.ID = P.COUNTRY_ID JOIN GOALS G
    ON G.PLAYER_ID = P.UNIFORM_NUM
WHERE
    G.GOAL_TIME IS NOT NULL;

-- ********* SQL練習問題 – 問60
------- 全ての試合のゴール時間と選手名を表示してください。左側外部結合を使用してオウンゴール（player_idがNULL）も表示してください
SELECT
    G.GOAL_TIME,
    P.UNIFORM_NUM,
    P.POSITION,
    P.NAME
FROM
    GOALS   G
    LEFT OUTER JOIN PLAYERS P
    ON P.UNIFORM_NUM = G.ID;