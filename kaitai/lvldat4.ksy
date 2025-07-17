meta:
  id: lvldat4
  endian: be
seq:
  - id: num_levels
    type: s4
  - id: num_bricks_total
    type: s4
    doc: Is multiplied by 13 while loading.
  - id: all_level_sizes
    type: u1
    repeat: expr
    repeat-expr: num_levels
  - id: levels
    type: level
    repeat: expr
    repeat-expr: num_levels
types:
  level:
    seq:
      - id: next_4_combos
        type: 
    types:
      num_combo:
        seq:
          