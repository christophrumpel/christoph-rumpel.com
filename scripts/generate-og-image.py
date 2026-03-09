#!/usr/bin/env python3
"""
Generate OG images for blog posts.

Usage:
    python3 scripts/generate-og-image.py "The Agentic Artisan"
    python3 scripts/generate-og-image.py "The Agentic Artisan" --output images/blog/headers/agentic-artisan.png
"""

import argparse
import textwrap
from pathlib import Path

from PIL import Image, ImageDraw, ImageFont

# Config
WIDTH = 1200
HEIGHT = 630
BG_COLOR = "#1a1a2e"
TEXT_COLOR = "#ffffff"
ACCENT_COLOR = "#e8343480"
SUBTITLE_COLOR = "#8888aa"

FONT_DIR = Path.home() / ".fonts"
FONT_BOLD = str(FONT_DIR / "InterDisplay-Bold.ttf")
FONT_REGULAR = str(FONT_DIR / "Inter-Regular.ttf")

# Fallbacks
import os
if not os.path.exists(FONT_BOLD):
    FONT_BOLD = "/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf"
if not os.path.exists(FONT_REGULAR):
    FONT_REGULAR = "/usr/share/fonts/truetype/dejavu/DejaVuSans.ttf"


def calculate_font_size(title: str) -> int:
    """Pick font size based on title length."""
    length = len(title)
    if length <= 20:
        return 72
    elif length <= 35:
        return 64
    elif length <= 50:
        return 56
    elif length <= 70:
        return 48
    else:
        return 42


def wrap_title(title: str, font: ImageFont.FreeTypeFont, max_width: int) -> list[str]:
    """Word-wrap title to fit within max_width pixels."""
    words = title.split()
    lines = []
    current_line = ""

    for word in words:
        test_line = f"{current_line} {word}".strip()
        bbox = font.getbbox(test_line)
        if bbox[2] <= max_width:
            current_line = test_line
        else:
            if current_line:
                lines.append(current_line)
            current_line = word

    if current_line:
        lines.append(current_line)

    return lines


def generate(title: str, output_path: str, subtitle: str = "christoph-rumpel.com"):
    img = Image.new("RGB", (WIDTH, HEIGHT), BG_COLOR)
    draw = ImageDraw.Draw(img)

    # Subtle gradient overlay (darker at bottom)
    for y in range(HEIGHT):
        opacity = int(40 * (y / HEIGHT))
        draw.line([(0, y), (WIDTH, y)], fill=(0, 0, 0, opacity))

    # Accent line at top
    draw.rectangle([(0, 0), (WIDTH, 4)], fill="#e83434")

    # Title
    font_size = calculate_font_size(title)
    title_font = ImageFont.truetype(FONT_BOLD, font_size)

    max_text_width = WIDTH - 160  # 80px padding each side
    lines = wrap_title(title, title_font, max_text_width)

    # Calculate total text height
    line_height = font_size + 12
    total_text_height = len(lines) * line_height

    # Center vertically (slightly above center)
    start_y = (HEIGHT - total_text_height) // 2 - 30

    for i, line in enumerate(lines):
        bbox = title_font.getbbox(line)
        text_width = bbox[2] - bbox[0]
        x = (WIDTH - text_width) // 2
        y = start_y + i * line_height
        draw.text((x, y), line, fill=TEXT_COLOR, font=title_font)

    # Subtitle / domain
    subtitle_font = ImageFont.truetype(FONT_REGULAR, 22)
    bbox = subtitle_font.getbbox(subtitle)
    sub_width = bbox[2] - bbox[0]
    sub_x = (WIDTH - sub_width) // 2
    sub_y = start_y + total_text_height + 40
    draw.text((sub_x, sub_y), subtitle, fill=SUBTITLE_COLOR, font=subtitle_font)

    # Small decorative dot
    dot_y = start_y + total_text_height + 20
    draw.ellipse(
        [(WIDTH // 2 - 3, dot_y), (WIDTH // 2 + 3, dot_y + 6)],
        fill="#e83434",
    )

    img.save(output_path, "PNG", quality=95)
    print(f"Generated: {output_path} ({WIDTH}x{HEIGHT})")


if __name__ == "__main__":
    parser = argparse.ArgumentParser(description="Generate OG image for blog post")
    parser.add_argument("title", help="Blog post title")
    parser.add_argument("--output", "-o", default=None, help="Output path")
    parser.add_argument("--subtitle", "-s", default="christoph-rumpel.com", help="Subtitle text")
    args = parser.parse_args()

    if args.output is None:
        slug = args.title.lower().replace(" ", "-").replace("'", "")
        args.output = f"images/blog/headers/{slug}.png"

    # Ensure output directory exists
    Path(args.output).parent.mkdir(parents=True, exist_ok=True)

    generate(args.title, args.output, args.subtitle)
