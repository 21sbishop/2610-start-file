import sys

MEMBERS = [
    ("Mayor", "David Whitmore", "david-whitmore", "a man with glasses in a dark blazer and white shirt", "0101", [
        "Presides over City Council meetings and sets the agenda",
        "Represents Orem with state and regional leaders",
        "Appoints members to city boards and commissions",
        "Signs ordinances, resolutions, and city contracts",
    ]),
    ("Mayor Pro Tempore", "Rosa Delgado", "rosa-delgado", "a smiling woman with curly hair in a striped jacket", "0102", [
        "Leads council meetings when the Mayor is absent",
        "Chairs the Budget and Finance Committee",
        "Reviews the annual city budget and capital projects",
    ]),
    ("Council Member", "Emily Larsen", "emily-larsen", "a smiling woman with long hair in a gray blazer", "0103", [
        "Liaison to the Orem Public Library board",
        "Oversees youth programs and the Youth City Council",
        "Supports downtown events, including Summerfest",
    ]),
    ("Council Member", "Marcus Bennett", "marcus-bennett", "a man in a dark suit and red tie", "0104", [
        "Liaison to the Police and Fire Departments",
        "Reviews emergency preparedness plans",
        "Serves on the Public Safety Advisory Board",
    ]),
    ("Council Member", "Nick Moretti", "nick-moretti", "a man with dark hair in a gray sweater and collared shirt", "0105", [
        "Liaison to Public Works and city utilities",
        "Oversees road maintenance and snow removal plans",
        "Reviews water, sewer, and storm drain projects",
    ]),
    ("Council Member", "Hannah Brooks", "hannah-brooks", "a laughing woman with dark hair in a red sweater", "0106", [
        "Liaison to Parks and Recreation",
        "Oversees the Recreation Center and city parks",
        "Plans trail and open space improvements",
    ]),
    ("Council Member", "Ryan Santos", "ryan-santos", "a smiling man with short dark hair and a beard in a white shirt", "0107", [
        "Liaison to the Planning Commission",
        "Reviews zoning changes and new housing projects",
        "Works with local businesses on economic growth",
    ]),
    ("Council Member", "Natalie Reyes", "natalie-reyes", "a smiling woman with long dark hair in a burgundy cardigan", "0108", [
        "Liaison to Neighborhood Services",
        "Leads community outreach and resident surveys",
        "Oversees the city's transportation and transit plans",
    ]),
]


def body(prefix, indent="    "):
    i = indent
    L = [f'{i}<p>The Orem City Council is made up of the Mayor and seven Council Members, all elected by Orem residents. Each member oversees different city departments. Reach out by email or phone with questions about the areas they serve.</p>',
         f'{i}<div class="employees">']
    for n, (title, name, slug, alt, ext, duties) in enumerate(MEMBERS):
        j = i + "  "
        k = j + "  "
        first, last = name.lower().split()
        email = f"{first}.{last}@orem.example.org"
        lazy = "" if n < 2 else ' loading="lazy"'
        L += [f'{j}<section>',
              f'{k}<div>',
              f'{k}  <h2>{name}</h2>',
              f'{k}  <p>{title}</p>',
              f'{k}  <img src="{prefix}{slug}.webp" alt="{title} {name}, {alt}" width="500" height="600"{lazy}>',
              f'{k}</div>',
              f'{k}<div>',
              f'{k}  <h2>Contact</h2>',
              f'{k}  <a class="email" href="mailto:{email}">{email}</a>',
              f'{k}  <a class="phone" href="tel:+1801555{ext}">(801) 555-{ext}</a>',
              f'{k}</div>',
              f'{k}<div>',
              f'{k}  <h2>Responsibilities</h2>',
              f'{k}  <ul>']
        L += [f'{k}    <li>{d}</li>' for d in duties]
        L += [f'{k}  </ul>', f'{k}</div>', f'{j}</section>']
    L.append(f'{i}</div>')
    return "\n".join(L)


if __name__ == "__main__":
    print(body(sys.argv[1], sys.argv[2] if len(sys.argv) > 2 else "    "))
