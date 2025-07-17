meta:
  id: retrieveflower
  endian: be
seq:
  - id: magic
    type: s4
  - id: show_sundown
    type: b1
  - id: fertilizer_multiplier
    type: s4
  - id: superfertilizer_multiplier
    type: s4
  - id: warp_multiplier
    type: s4
  - id: water_multiplier
    type: s4
  - id: giga_multiplier
    type: s4
  - id: previous_flower
    type: android_flower
  - id: current_flower
    type: android_flower
  - id: rank
    type: s4
  - id: player_lid
    type: s8
  - id: player_pid
    type: s8
  - id: is_mod
    type: u1
  - id: seeds_available
    type: s8
  - id: stars_available
    type: s8
  - id: country_code_size
    type: u2
  - id: country_code
    type: str
    size: country_code_size
    encoding: UTF-8
  - id: lessons_completed
    type: s4
  - id: max_lessons
    type: s4
  - id: advice_size
    type: u2
  - id: advice
    type: str
    size: advice_size
    encoding: UTF-8
  - id: reconnect_count
    type: s4
  - id: reconnects
    type: reconnect
    repeat: expr
    repeat-expr: reconnect_count
  - id: scores_count
    type: s4
  - id: prices_count
    type: s4
  - id: messages_count
    type: s4
  - id: countries_size
    type: s4
  - id: countries
    type: country_entry
    repeat: expr
    repeat-expr: countries_size
types:
  item_entry:
    seq:
      - id: item_amount
        type: s8
  reconnect:
    seq:
      - id: reconnect_size
        type: u2
      - id: reconnects
        type: str
        size: reconnect_size
        encoding: UTF-8
  country_entry:
    seq:
      - id: country_code_size
        type: u2
      - id: country_code
        type: str
        size: country_code_size
        encoding: UTF-8
      - id: country_name_size
        type: u2
      - id: country_name
        type: str
        size: country_name_size
        encoding: UTF-8
  android_flower:
    seq:
      - id: version
        type: s4
        doc: Should be 9 (this is the version this format documents).
      - id: username_size
        type: u2
      - id: username
        type: str
        size: username_size
        encoding: UTF-8
      - id: password_size
        type: u2
      - id: password
        type: str
        size: password_size
        encoding: UTF-8
      - id: uid_size
        type: u2
      - id: uid
        type: str
        size: uid_size
        encoding: UTF-8
      - id: flower_type
        type: u1
        enum: flower_types
      - id: created_stamp
        type: s8
        doc: Unix timestamp.
      - id: last_access_stamp
        type: s8
        doc: Unix timestamp.
      - id: height
        type: s8
      - id: sun
        type: s8
      - id: water
        type: s8
      - id: item_count
        type: s4
        doc: Something with items.
      - id: items
        type: item_entry
        repeat: expr
        repeat-expr: item_count
      - id: max_shield
        type: s4
      - id: shield_regen
        type: s8
      - id: shield_strength
        type: s8
      - id: combat_enabled
        type: b1
      - id: star_income_stamp
        type: s8
      - id: star_streak
        type: s4
      - id: income_upgrades
        type: s4
      - id: purchases_count
        type: s4
      - id: purchases
        type: s4
        repeat: expr
        repeat-expr: purchases_count
      - id: last_save_stamp
        type: s8
      - id: centrennium
        type: s8
      - id: flowerschool_progress
        type: s8
      - id: v9_reserve_2
        type: s8
      - id: v9_reserve_3
        type: s8
      - id: v9_reserve_4
        type: s8
      - id: v9_reserve_5
        type: s8
      - id: v9_reserve_6
        type: s8
      - id: v9_reserve_7
        type: s8
      - id: v9_reserve_8
        type: s8
      - id: v9_reserve_9
        type: s8
enums:
  flower_types:
    0: rose
    1: daisy
    2: iris
    3: orchid
    4: sunflower
  item_types:
    0: autowater
    1: fertilizer
    2: unused_ads_something







