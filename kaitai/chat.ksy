meta:
  id: chat
  endian: be
seq:
  - id: current_heap_prize_size
    type: u2
  - id: current_heap_prize
    type: str
    size: current_heap_prize_size
    encoding: UTF-8
  - id: seeds
    type: s8
  - id: stars
    type: s8
  - id: max_friends
    type: s4
  - id: used_friends
    type: s4
  - id: is_blocked
    type: b1
  - id: read_int
    type: s4
  - id: what
    type: b1
  - id: size
    type: s4
  - id: messages
    type: message
    repeat: expr
    repeat-expr: size
  - id: new_messages
    type: s4
types:
  message:
    seq:
      - id: message_id
        type: s8
      - id: poster_pid
        type: s8
      - id: read_long
        type: s8
      - id: poster_game_id_size
        type: u2
      - id: poster_game_id
        type: str
        size: poster_game_id_size
        encoding: UTF-8
      - id: poster_icon_url_size
        type: u2
      - id: poster_icon_url
        type: str
        size: poster_icon_url_size
        encoding: UTF-8
      - id: poster_flag_url_size
        type: u2
      - id: poster_flag_url
        type: str
        size: poster_flag_url_size
        encoding: UTF-8
      - id: poster_name_size
        type: u2
      - id: poster_name
        type: str
        size: poster_name_size
        encoding: UTF-8
      - id: poster_message_size
        type: u2
      - id: poster_message
        type: str
        size: poster_message_size
        encoding: UTF-8
      - id: read_long_2
        type: s8
      - id: is_post_clickable_now
        type: u1
      - id: is_poster_my_friend_now
        type: u1
      - id: am_i_on_posters_friend_list_now
        type: u1
      - id: poster_has_friend_room_now
        type: u1
      - id: device_type
        type: s4
      - id: poster_is_blocked_now
        type: u1
