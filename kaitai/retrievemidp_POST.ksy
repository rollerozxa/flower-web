meta:
  id: retrievemidp_post
  endian: be
seq:
  - id: identifier1_size
    type: u2
  - id: identifier1
    type: str
    size: identifier1_size
    encoding: UTF-8
    doc: Some kind of identifier, which in 2.31 (latest) is "superOrigami"
  - id: identifier2_size
    type: u2
  - id: identifier2
    type: str
    size: identifier2_size
    encoding: UTF-8
    doc: Some kind of identifier, which in 2.31 (latest) is "roseV2"
  - id: un3
    type: u8
  - id: email_size
    type: u2
  - id: email
    type: str
    size: email_size
    encoding: UTF-8
  - id: un5
    type: s4
  - id: un6
    type: u8
  - id: unused1
    type: s4
    doc: Unused integer which always is 50.
  - id: unused2
    type: s4
    doc: Unused integer which always is 1.
  - id: un9
    type: u8
  - id: un10
    type: u1
  - id: un11
    type: s4
  - id: username_size
    type: u2
  - id: username
    type: str
    size: username_size
    encoding: UTF-8


