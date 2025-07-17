meta:
  id: retrievepop
  endian: be
seq:
  - id: magic
    type: s4
  - id: rank
    type: u4
  - id: name_size
    type: u2
  - id: name
    type: str
    size: name_size
    encoding: UTF-8
  - id: earnurl_size
    type: u2
  - id: earnurl
    type: str
    size: earnurl_size
    encoding: UTF-8
    doc: Old and unused value which used to contain URL to earn stars.
  - id: seeds
    type: u4
  - id: stars
    type: u4
  - id: country_size
    type: u2
  - id: country
    type: str
    size: country_size
    encoding: UTF-8
  - id: online_scores
    type: u4
    doc: Unused Origami Flower remnants, and does nothing.
  - id: inbox
    type: u4
    doc: TODO
  - id: countries_size
    type: u4
  - id: countries
    type: country_entry
    repeat: expr
    repeat-expr: countries_size
types:
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