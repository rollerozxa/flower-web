meta:
  id: retrieveabp
  endian: be
seq:
  - id: magic
    type: s4
  - id: abp_user_version
    type: s4
    doc: The latest and only version is 1.
  - id: username_size
    type: u2
  - id: username
    type: str
    size: username_size
    encoding: UTF-8
  - id: upgrades_count
    type: s4
  - id: upgrades
    type: s4
    repeat: expr
    repeat-expr: upgrades_count
  - id: announcement_size
    type: u2
  - id: announcement
    type: str
    size: announcement_size
    encoding: UTF-8
  - id: latest_game_version
    type: s4
  - id: player_lid
    type: s8
  - id: player_pid
    type: s8
  - id: messages
    type: s4
  - id: current_online_rank
    type: s4
  - id: best_online_rank
    type: s4