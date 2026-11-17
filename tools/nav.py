# Rewrites the <ul class="site-nav"> menu on every HTML page so the
# HTML version matches the WordPress menu, with WordPress's way-finding
# classes (current-menu-item, current-menu-parent, menu-item-has-children).
import re, sys, os

os.chdir(sys.argv[1] if len(sys.argv) > 1 else ".")

MENU = [
    ("index.html#hero", "Home"),
    ("index.html#features", "Explore"),
    ("index.html#visit", "Visit"),
    ("amenities.html", "Amenities"),
    ("Facilities", [("library.html", "Library"), ("recreation-center.html", "Recreation Center"),
                    ("sports-field.html", "Sports Field"), ("city-park.html", "City Park")]),
    ("City Council", [("meetings.html", "Meetings"), ("council-members.html", "Council Members")]),
    ("Contact Us", [("report-street-lamp.html", "Report Street Lamp")]),
]
PAGES = ["index.html", "amenities.html", "library.html", "recreation-center.html", "sports-field.html",
         "city-park.html", "meetings.html", "council-members.html", "report-street-lamp.html"]


def li(href, text, page, pad):
    if page == "index.html" and href.startswith("index.html#"):
        href = href[len("index.html"):]
    current = href == page or (page == "index.html" and href == "#hero")
    if current:
        return f'{pad}<li class="current-menu-item"><a href="{href}" aria-current="page">{text}</a></li>'
    return f'{pad}<li><a href="{href}">{text}</a></li>'


def nav(page):
    i = "        "
    out = ['<ul class="site-nav">']
    for href, item in MENU:
        if isinstance(item, list):
            cls = "menu-item-has-children"
            if any(h == page for h, _ in item):
                cls += " current-menu-parent"
            out.append(f'{i}<li class="{cls}"><a href="#">{href}</a>')
            out.append(f"{i}  <ul>")
            out += [li(h, t, page, i + "    ") for h, t in item]
            out.append(f"{i}  </ul>")
            out.append(f"{i}</li>")
        else:
            out.append(li(href, item, page, i))
    out.append("      </ul>")
    return "\n".join(out)


for page in PAGES:
    src = open(page).read()
    new = re.sub(r'<ul class="site-nav">.*?\n      </ul>', lambda m: nav(page), src, count=1, flags=re.S)
    open(page, "w").write(new)
    print("updated", page)
