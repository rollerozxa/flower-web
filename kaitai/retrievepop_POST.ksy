meta:
  id: retrievepop_post
  endian: be
seq:
  - id: action_size
    type: u2
  - id: action
    type: str
    size: action_size
    encoding: UTF-8
  - id: uid_size
    type: u2
  - id: uid
    type: str
    size: uid_size
    encoding: UTF-8
  - id: username_size
    type: u2
  - id: username
    type: str
    size: username_size
    encoding: UTF-8
  - id: pass_size
    type: u2
  - id: pass
    type: str
    size: pass_size
    encoding: UTF-8
    doc: Unused password thing
  - id: max_scores
    type: s4
  - id: country_size
    type: u2
  - id: country
    type: str
    size: country_size
    encoding: UTF-8