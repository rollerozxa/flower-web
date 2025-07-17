meta:
  id: retrievemidp
  endian: be
seq:
  - id: unknown_j
    type: s8
  - id: unknown_ad89ef
    type: s8
  - id: seeds
    type: s4
  - id: unknown_l
    type: s4
  - id: unknown_n
    type: b1
  - id: unknown_79ab09_size
    type: u2
  - id: unknown_79ab09
    type: str
    size: unknown_79ab09_size
    encoding: UTF-8
  - id: rank
    type: s4
  - id: unknown_a
    type: s4
  - id: announcement_size
    type: u2
  - id: announcement
    type: str
    size: announcement_size
    encoding: UTF-8