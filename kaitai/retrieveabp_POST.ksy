meta:
  id: retrieveabp_post
  endian: be
seq:
  - id: uid_size
    type: u2
  - id: uid
    type: str
    size: uid_size
    encoding: UTF-8
  - id: unused1
    type: s4
    doc: Always 1.
  - id: score
    type: abp_score
  - id: score2
    type: abp_score
types:
  abp_score:
    seq:
      - id: player_lid
        type: s8
      - id: username_size
        type: u2
      - id: username
        type: str
        size: username_size
        encoding: UTF-8
      - id: levels_completed
        type: s4
      - id: game_frames_total
        type: s8