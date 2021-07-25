<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Q & A</title>

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <!-- Fontawesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
    <header>
      <div class="header_content">
        <div class="logo">
          <!-- <img src="" alt=""> -->
          <!-- <p>Q&A</p> -->
          <a href="">Q & A</a>
        </div>

        <ul>
          <a href="index.html" class="active">
            <li><i class="fas fa-home"></i></li>
          </a>
          <a href="">
            <li><i class="fas fa-bell"></i></li>
          </a>
          <a href="#" onclick="postQuestion()">
            <li><i class="fas fa-plus-square"></i></li>
          </a>
          <a href="">
            <li><i class="fas fa-users"></i></li>
          </a>
          <a href="">
            <li><i class="fas fa-user-alt"></i></li>
          </a>
        </ul>

        <div class="logout">
          <a href="">
            <i class="fas fa-power-off"></i>
          </a>
        </div>
      </div>
    </header>

    <!-- Ask Question MOdal -->
    <div
      class="modal fade"
      id="postModal"
      tabindex="-1"
      aria-labelledby="postModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="postModalLabel">Ask New Question</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label"
                  >Your Question:</label
                >
                <input type="text" class="form-control" id="recipient-name" />
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label"
                  >Describe Your Question:</label
                >
                <textarea
                  class="form-control"
                  id="message-text"
                  rows="9"
                ></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <div class="d-flex">
              <input type="file" name="" id="image" />
            </div>
            <div>
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button type="button" class="btn btn-success">Post Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <main>
      <section class="post">
        <div class="post_content">
          <img src="img/profile.jpg" alt="" />
          <div onclick="postQuestion();">Ask Your Question Here?</div>
        </div>
      </section>

      <section>
        <div class="main_post">
          <div class="profile">
            <img src="img/profile.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href="profile.html">Penny Doe</a>
              </h2>
              <small class="card_sub_title">1 Month ago</small>
              <a
                href=""
                class="follow_button"
                style="position: absolute; top: 2em; right: 0"
                >Maths</a
              >
            </div>
          </div>
          <div class="text_content">
            <a href="single_post.html">
              <h2 class="section_title">Who is the father of C?</h2>
            </a>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
              repellat iusto officia quaerat! Iste maiores voluptate,
              exercitationem alias omnis modi in nostrum dolores. Dolorum fugit
              sunt molestiae hic qui quam earum! Veniam rerum pariatur facere
              voluptatum distinctio, dolorem cupiditate nesciunt?
              <a href="" class="see_more">See More</a>
            </p>
            <img src="img/post.jpg" class="post_image" alt="" />
          </div>
          <div class="footer_content">
            <div class="left_content">
              <a href="" title="Up Vote"
                >30<i class="fas fa-arrow-alt-circle-up"></i
              ></a>
              <a href="" title="Down Vote"
                ><i class="fas fa-arrow-alt-circle-down"></i>10</a
              >
              <a href="" style="padding-left: 1.5em" title="Total Views"
                ><i class="fas fa-eye"></i>10</a
              >
            </div>
            <div class="right_content">
              <a href="" title="Total Comments"
                >50<i class="fas fa-comments"></i
              ></a>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="main_post">
          <div class="profile">
            <img src="img/profile2.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href="profile.html">Jane Doe</a>
              </h2>
              <small class="card_sub_title">10 Month ago</small>
              <a
                href=""
                class="follow_button"
                style="position: absolute; top: 2em; right: 0"
                >Programming</a
              >
            </div>
          </div>
          <div class="text_content">
            <a href="single_post.html">
              <h2 class="section_title">Who is the father of Linux?</h2>
            </a>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
              repellat iusto officia quaerat! Iste maiores voluptate,
              exercitationem alias omnis modi in nostrum dolores. Dolorum fugit
              sunt molestiae hic qui quam earum! Veniam rerum pariatur facere
              voluptatum distinctio, dolorem cupiditate nesciunt?
              <a href="" class="see_more">See More</a>
            </p>
            <!-- <img src="img/post.jpg" class="post_image" alt="" /> -->
          </div>
          <div class="footer_content">
            <div class="left_content">
              <a href="" title="Up Vote"
                >30<i class="fas fa-arrow-alt-circle-up"></i
              ></a>
              <a href="" title="Down Vote"
                ><i class="fas fa-arrow-alt-circle-down"></i>50</a
              >
              <a href="" style="padding-left: 1.5em" title="Total Views"
                ><i class="fas fa-eye"></i>20</a
              >
            </div>
            <div class="right_content">
              <a href="" title="Total Comments"
                >500<i class="fas fa-comments"></i
              ></a>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="main_post">
          <div class="profile">
            <img src="img/profile.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href="profile.html">John Doe</a>
              </h2>
              <small class="card_sub_title">10 Month ago</small>
              <a
                href=""
                class="follow_button"
                style="position: absolute; top: 2em; right: 0"
                >AI</a
              >
            </div>
          </div>
          <div class="text_content">
            <a href="single_post.html">
              <h2 class="section_title">Who is the father of Computer?</h2>
            </a>
          </div>
          <div class="footer_content">
            <div class="left_content">
              <a href="" title="Up Vote"
                >30<i class="fas fa-arrow-alt-circle-up"></i
              ></a>
              <a href="" title="Down Vote"
                ><i class="fas fa-arrow-alt-circle-down"></i>1000</a
              >
              <a href="" style="padding-left: 1.5em" title="Total Views"
                ><i class="fas fa-eye"></i>200000</a
              >
            </div>
            <div class="right_content">
              <a href="" title="Total Comments"
                >50<i class="fas fa-comments"></i
              ></a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <aside>
      <div class="aside_content">
        <div class="search_box">
          <i class="fas fa-search"></i>
          <form class="">
            <input
              class=""
              name="search"
              type="search"
              placeholder="Search your query"
              aria-label="Search"
            />
          </form>
        </div>

        <div class="profile_section">
          <div class="profile">
            <img src="img/profile.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href="profile.html"
                  >John Doe
                  <i class="fas fa-check-circle"></i>
                </a>
              </h2>
              <p class="card_sub_title">Science Expert</p>
            </div>
          </div>
        </div>

        <div class="favourite_section">
          <h2 class="section_title">Your Favourites</h2>

          <div class="your_favourite">
            <a href="" class="capsule" title="Add to your favourite list"
              >Science</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Tech</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Arts</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Music</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Travel</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Hospitality</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              >Covid19</a
            >
          </div>
        </div>

        <div class="popular_section">
          <h2 class="section_title">Popular</h2>

          <div class="popular_content">
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Science</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Tech</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Arts</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Music</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Travel</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Hospitality</a
            >
            <a href="" class="capsule" title="Add to your favourite list"
              ><i class="fas fa-plus"></i>Covid19</a
            >
          </div>
        </div>

        <div class="recommended_section">
          <h2 class="section_title">Recommended</h2>
          <div class="profile">
            <img src="img/profile3.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href=""
                  >Jane Doe
                  <i class="fas fa-check-circle"></i>
                </a>
              </h2>
              <p class="card_sub_title">Python Expert</p>
            </div>
            <a href="" class="follow_button">Follow</a>
          </div>
          <div class="profile">
            <img src="img/profile2.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href="">Jenny Doe <i class="fas fa-check-circle"></i> </a>
              </h2>
              <p class="card_sub_title">Java Expert</p>
            </div>
            <a href="" class="follow_button">Follow</a>
          </div>
          <div class="profile">
            <img src="img/profile.jpg" alt="" />
            <div class="text_content">
              <h2 class="card_title">
                <a href="">Penny Doe</a>
              </h2>
              <!-- <p class="card_sub_title">JavaScript Expert</p> -->
            </div>
            <a href="" class="follow_button">Follow</a>
          </div>
        </div>
      </div>
    </aside>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <script>
      function postQuestion() {
        $("#postModal").modal("show");
      }
      // $("#postModal").click(function () {
      //   // alert("The paragraph was clicked.");
      //   console.log("ok");
      // });
    </script>
  </body>
</html>
