let allPosts = document.querySelectorAll(".post");

console.log(allPosts);

allPosts.forEach((post) => {
  let editButton = post.querySelector(".edit-post");
  let deleteButton = post.querySelector(".delete-post");

  editButton.addEventListener("click", () => {
    let id = post.querySelector(".post-id").textContent;
    let title = post.querySelector(".post-title").textContent;
    let content = post.querySelector(".post-content").textContent;
    let category_id = post.querySelector(".post-category-id").textContent;
    let author = post.querySelector(".post-author").textContent;

    let form = document.querySelector(".post-edit-form");
    

    document.querySelector("#EditPostModalLabel").textContent = "Úprava článku číslo: " + id;
    form.querySelector("#category").value = category_id;
    form.querySelector("#title").value = title;
    form.querySelector("#content").value = content;
    form.querySelector("#author").value = author;
    form.querySelector("#id").value = id;
    
    let modal = new bootstrap.Modal(document.getElementById("EditPostModal"));
    modal.show();
  });
});
