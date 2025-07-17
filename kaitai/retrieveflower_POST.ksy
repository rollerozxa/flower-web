meta:
  id: retrieveflower_post
  endian: be
seq:
  - id: action_size
    type: s2
  - id: action
    type: str
    size: action_size
    encoding: UTF-8
  - id: uid_size
    type: s2
  - id: uid
    type: str
    size: uid_size
    encoding: UTF-8
  - id: flower_size
    type: s2
  - id: flower
    type: str
    size: flower_size
    encoding: UTF-8
  - id: username_size
    type: s2
  - id: username
    type: str
    size: username_size
    encoding: UTF-8
  - id: pass_size
    type: s2
  - id: pass
    type: str
    size: pass_size
    encoding: UTF-8
    doc: Unused password thing
  - id: unused1
    type: s4
    doc: Unused integer. Value is always 0x3.
  - id: max_scores
    type: s4
  - id: difference_between_scores
    type: s4
  - id: price_list
    type: b1
  - id: country_size
    type: s2
  - id: country
    type: str
    size: country_size
    encoding: UTF-8
  - id: survey_completed
    type: b1
